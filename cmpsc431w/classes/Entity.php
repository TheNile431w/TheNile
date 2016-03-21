<?php

require_once("MySQL.php");

abstract class Entity {
	protected $attrs;

	/**
	 * __construct($args) : FULL constructor.
	 * @param [ int | string | array ] $args : integer primary key or single dimensional array of attributes that define the class
	 */
	public function __construct($args, $newProv=FALSE) {
		$info = static::getStaticSQLInfo();
		$tables = array();
		$temp = static::getTableName();
		while($temp != "Entity") {
			array_unshift($tables, $temp);
			$temp = get_parent_class($temp);
		}

		$this->setAttrs($args);

		if(is_null($this->attrs))
			$this->attrs = array();

		if(is_int($args) OR is_string($args)) {
			if($newProv)
				throw new Exception("Cannot instantiate a new " . static::getTableName() . " from anything other than an associative array with attributes as keys and values as values.");

			// LOAD FROM KEY
			$db = new database();
			foreach($tables as $t) {
				$r = $db->query("SELECT * FROM " . $t . " WHERE ". $t::getPrimaryAttr() ."='" . $args . "';");
				if($r->num_rows == 1) {
					$res = $r->fetch_assoc();
					setAttrs($res);
				} elseif($r->num_rows == 0)
					throw new Exception("No " . $t . "'s found where " . $t::getPrimaryAttr() . " = " . $args . ".");
				else
					throw new Exception("Multiple entries found.");
			}
		} else {
			$allPrims = TRUE;
			foreach($tables as $t) {
				foreach(explode(",", $t::getPrimaryAttr()) as $a) {
					if(!isset($args[trim($a)])) {
						$allPrims = FALSE;
					}
				}
			}
			if($allPrims == TRUE) {
				foreach($tables as $t) {
					$whereClause = array();
					foreach(explode(",", $t::getPrimaryAttr()) as $a) {
						$a = trim($a);
						$whereClause[] = $a . "='" . $args[$a] . "'";
					}
					$db = new database();
					$r = $db->query("SELECT * FROM " . $t . " WHERE " . implode(" AND ", $whereClause) . ";");
					if($r->num_rows == 1) {
						if($newProv)
							throw new Exception("A ". $t ." already exists with the same Primary Key values as given for the new entry: " . implode(" AND ", $whereClause));
						$res = $r->fetch_assoc();
						$this->setAttrs($res);
					} elseif($r->num_rows == 0) {
						$newProv = TRUE;
						break;
					} else
						throw new Exception("Multiple entries found.");
				}
			} else {
				$newProv = TRUE;
			}
		}

		if($newProv) {
			foreach($tables as $t) {
				$tableArgs = array();
				$db = new database();
				$db->open();
				foreach($args as $a => $v) {
					if(isset($info[$t][$a])) {
						$tableArgs[$a] = $db->real_escape_string($v);
					}
				}
				$r = $db->query("INSERT INTO " . $t . "(" . implode(',', array_keys($tableArgs)) . ") VALUES (\"" . implode('","', $tableArgs) . "\");");
				if($r != FALSE AND isset($info[$t][static::getPrimaryAttr()]) AND $this->getID() == FALSE AND strpos(strtoupper($info[$t][static::getPrimaryAttr()]['restrictions']), 'AUTO_INCREMENT') != FALSE) {
					$r = $db->query("SELECT LAST_INSERT_ID()");
					$this->setAttrs($r->fetch_assoc());
				}
				if(!$r)
					throw new Exception("Error saving this new entry.");
			}
		}
	}

	/**
	 * static protected getPrimaryAttr : Returns string representation of this table's primary attribute.
	 * @return string primary attribute(s) (commma , delimited for multiple attributes)
	 */
	abstract static protected function getPrimaryAttr();

	/**
	 * static protected getTableName : Returns string representation of this table's table name.
	 * @return string SQL table name
	 */
	abstract static protected function getTableName();

	/**
	 * static public getAttributeList : Returns array of strings representing all attributes of this class (including parent classes)
	 * @return array attributes associated with this table 
	 */
	abstract static public function getAttributeList();

	/**
	 * protected function getSQLInfo() :
	 * Returns 3d array [ TABLE NAME ] [ ATTRIBUTE NAME ] [ KEY ] = STRING
	 * Where ATTRIBUTE NAME = {
	 * 		{'FOREIGN'['keys'] = string / array representing the foreign keys, ['ref'] = string / array representing the foreign key REFRENCES},
	 * 		{'UNIQUE'['keys'] = similar to FOREIGN}}
	 * Where KEY = {
	 * 		'val' = (value),
	 * 		'type' = (SQL data type),
	 * 		[ 'restrictions' ] = (eg. NOT NULL),
	 * 		[ 'change' ] = (isset only when there is a discrepancy between local data and SQL data)}
	 * @return 3d array representing the full sql information of this object
	 */
	abstract protected function getSQLInfo();

	/**
	 * static protected getSQLInfo() :
	 * Returns the static portion of the SQL information, that is what can be given without 
	 * @return [type] [description]
	 */
	abstract static protected function getStaticSQLInfo();

	//abstract public function toString();
	//abstract protected function toArray();

	public function getID() {
		if(count(explode(",", static::getPrimaryAttr())) == 1) {
			return $this->attrs[static::getTableName()][static::getPrimaryAttr()]['val'];
		} else {
			$pAttrs = array();

			foreach(explode(",", static::getPrimaryAttr()) as $pAttr) {
				if($this->attrs[static::getTableName()][trim($pAttr)]['val'] != false)
					$pAttrs[$pAttr] = $this->attrs[static::getTableName()][trim($pAttr)]['val'];
			}

			if(count($pAttrs) > 0)
				return $pAttrs;
			return false;
		}
	}

	public function save() {
		$query = array();
		if($this->getID() == false) {
			// New Entry
			foreach($this->attrs as $table => $t) {
				$validAttrs = array();
				foreach($t as $attr => $a) {
					if($this->attrs[$table][$attr]['val'] != false) {
						$validAttrs[$attr] = $this->attrs[$table][$attr]['val'];
					}
				}
				$query[$table] = "INSERT INTO " . $table . "(" . implode(",", array_keys($validAttrs)) . ") OUTPUT INSERTED.* VALUES (" . implode(",", $validAttrs) . ");";
			}
		} else {
			foreach($this->attrs as $table => $t) {
				$validAttrs = array();
				foreach($t as $attr => $a) {
					if($this->attrs[$table][$attr]['val'] != false AND isset($this->attrs[$table][$attr]['change'])) {
						unset($this->attrs[$table][$attr]['change']);
						$validAttrs[$attr] = $attr . "=" . $this->attrs[$table][$attr]['val'];
					}
				}
				$id = $this->getID();
				$whereClause = array();
				foreach(explode(",", static::getPrimaryAttr()) as $a) {
					$a = trim($a);
					$whereClause[] = $a . "=" . $id[$a];
				}
				$query[$table] = "UPDATE " . $table . " SET " . implode(",", $validAttrs) . " WHERE " . implode(" AND ", $whereClause) . ";";
			}
		}

		$db = new database();
		$db->open();
		foreach($query as $t => $q) {
			$r = $db->query($q);
			$r = $r->fetch_assoc();
			var_dump($r);
		}
		$db->close();
	}

	public function load($args) {
		$info = static::getStaticSQLInfo();
		$tables = array();
		$temp = static::getTableName();
		while($temp != "Entity") {
			array_unshift($tables, $temp);
			$temp = get_parent_class($temp);
		}

		if(is_int($args) OR is_string($args)) {
			// LOAD FROM KEY
			$db = new database();
			$res = array();
			foreach($tables as $t) {
				$r = $db->query("SELECT * FROM " . $t . " WHERE ". $t::getPrimaryAttr() ."='" . $args . "';");
				if($r->num_rows == 0)
					return array();
				else {
					$tempRes = FALSE;
					$i = 0;
					while($tempRes = $r->fetch_assoc()) {
						if(isset($res[$i]))
							$res[$i] = array_merge($res[$i], $r->fetch_assoc());
						else
							$res[$i] = $r->fetch_assoc();
						$i++;
					}
				}
			}
			foreach($res as $i=>$r) {
				$staticTable = static::getTableName();
				$res[$i] = new $staticTable($res[$i]);
			}
			return $res;
		} else {
			$res = array();
			foreach($tables as $t) {
				$whereClause = array();
				foreach($args as $a => $v) {
					$a = trim($a);
					if(isset($info[$t][$a]))
						$whereClause[] = $a . "='" . $v . "'";
				}
				$db = new database();
				$r = $db->query("SELECT * FROM " . $t . " WHERE " . implode(" AND ", $whereClause) . ";");
				if($r->num_rows == 0) {
					return array();
				} else {
					$tempRes = FALSE;
					$i = 0;
					while($tempRes = $r->fetch_assoc()) {
						if(isset($res[$i]))
							$res[$i] = array_merge($res[$i], $tempRes);
						else
							$res[$i] = $tempRes;
					}
				}
			}
			foreach($res as $i=>$r) {
				$staticTable = static::getTableName();
				$res[$i] = new $staticTable($res[$i]);
			}
			return $res;
		}
	}

	private function setAttrs($args, $changeVal = NULL) {
		foreach($args as $a => $v) {
			if(in_array($a, static::getAttributeList())) {
				$t = static::getTableName(); $prev = NULL;
				while($t != 'Entity' AND in_array($a, $t::getAttributeList())) {
					$prev = $t;
					$t = get_parent_class($t);
				}
				$this->attrs[$prev][$a]['val'] = $args[$a];
				if(!is_null($changeVal))
					$this->attrs[$prev][$a]['change'] = $changeVal;
				elseif(isset($this->attrs[$prev][$a]['change']))
					unset($this->attrs[$prev][$a]['change']);
			}
		}
	}

	public function set($args) {
		$this->setAttrs($args, 'edit');
	}

	public static function getReferences() {
		$foreignTables = array();
		foreach(static::getStaticSQLInfo() as $t => $av) {
			if(isset($av['foreign'])) {
				$foreignTables[] = explode("(", $av['foreign'])[0];
			}
		}
		foreach($foreignTables as $t) {
			$foreignTables = array_merge($foreignTables, $t::getReferences());
		}
	}

	public static function create_table() {
		$queries = array();
		$strQueries = array();
		foreach(static::getStaticSQLInfo() as $table => $tv) {
			$queries[$table] = array();
			$queries[$table]["common"] = array();
			$queries[$table]["unique"] = array();
			$queries[$table]["primary"] = "PRIMARY KEY (" . static::getPrimaryAttr() . ")";
			$queries[$table]["foreign"] = array();
			foreach($tv as $attr => $av) {
				if($attr == "FOREIGN") {
					if(!isset($av["ref"]) || !isset($av["keys"]))
						throw new Exception("No references for foreign key in " . $table);
					if(is_array($av["keys"])) {
						foreach($av['keys'] as $i => $k) {
							$queries[$table]["foreign"][] = "FOREIGN KEY (" . $k . ") REFERENCES " . $av["ref"][$i];
						}
					}
					elseif(is_string($av["keys"]))
						$queries[$table]["foreign"][] = "FOREIGN KEY (" . $av["keys"] . ") REFERENCES " . $av["ref"];
				} elseif($attr == "UNIQUE") {
					if(is_string($av))
						$queries[$table]["unique"][] = "UNIQUE (" . $av . ")";
					elseif(is_array($av)) {
						foreach($av as $a => $v) {
							if(is_string($v))
								$queries[$table]["unique"][] = "UNIQUE (" . $v . ")";
							elseif(is_array($v)) {
								$queries[$table]["unique"][] = "UNIQUE (" . implode(", ", $v) . ")";
							}
						}
					}
				} else {
					if(!isset($av['type'])) {
						throw new Exception("Error in table " . $table . ": No type for attribute: " . $attr);
					} else {
						if($av['type'] == 'KEY')
							$av['type'] = "INT(11) UNSIGNED";
						$queries[$table]["common"][$attr] = $attr . " " . $av["type"];
						if(isset($av["restrictions"]))
							$queries[$table]['common'][$attr] .= " " . $av['restrictions'];
						if(isset($av['foreign']))
							$queries[$table]["foreign"][] = "FOREIGN KEY (" . $attr . ") REFERENCES " . $av["foreign"];
					}
				}
			}


			$DELIM = "\n\t";
			$oneDQueries = array();
			foreach($queries[$table] as $t => $v) {
				if(is_array($v) AND strlen(implode(",".$DELIM, $v)) > 0)
					$oneDQueries[] = implode(",".$DELIM, $v);
				elseif(is_string($v) AND strlen($v) > 0)
					$oneDQueries[] = $v;
			}
			$strQueries[$table] = "CREATE TABLE " . $table . "(" . implode(",".$DELIM, $oneDQueries) . ");";
		}

		return $strQueries;
	}
}

?>
