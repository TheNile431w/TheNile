<?php

class User extends Entity {

	public static function getAttributeList() {
		return array('username', 'name', 'email', 'password', 'income');
	}

	/**
	 * Gets SQL Info in 3-dimensional array format
	 * INFO		: 'type' : PRIMARY / TEXT / REAL / INT / etc.
	 * 			: 'restrictions' : NOT NULL / etc.
	 * 			: 'foreign' : Table_Name(attr) [ ON UPDATE ___ ] [ ON DELETE ___ ]
	 * @return array [ TABLE_NAME ] [ ATTR_NAME ] [ INFO ] = STRING VALUE
	 */
	protected function getSQLInfo() {
		$attrs = array_merge(self::getStaticSQLInfo(), $this->attrs);

		return $attrs;
	}

	protected static function getStaticSQLInfo() {
		$attrs = array();
		$table = self::getTableName();

		$attrs[$table]['username']['type'] = "VARCHAR(20)";
		$attrs[$table]['name']['type'] = "TEXT";
		$attrs[$table]['email']['type'] = "TEXT";
		$attrs[$table]['password']['type'] = "TEXT";
		$attrs[$table]['income']['type'] = "REAL";

		$attrs[$table]['name']['restrictions'] = "NOT NULL";
		$attrs[$table]['email']['restrictions'] = "NOT NULL";
		$attrs[$table]['password']['restrictions'] = "NOT NULL";

		return $attrs;
	}

	public static function getTableName() {
		return "User";
	}

	public static function getPrimaryAttr() {
		return "username";
	}

	public function getSubClass() {
		$isPerson = FALSE;
		$isCompany = FALSE;
		if(isset($_GET['pid'])) {
			try {
				$user = new Person(array("username" => $this->get("username")));
				$isPerson = TRUE;
			} catch(Exception $e) {
				try {
					$user = new Company(array("username" => $this->get("username")));
					$Company = TRUE;
				} catch(Exception $e) { }
			}
		}
		if($isPerson OR $isCompany)
			return $user;
		return FALSE;
	}
}

include("Person.php");
include("Company.php");

?>
