<?php

class ParentCategory extends Entity {
	public static function getAttributeList() {
		return array('child', 'parent');
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

		$attrs[$table]['child']['type'] = "VARCHAR(20)";
		$attrs[$table]['parent']['type'] = "VARCHAR(20)";

		$attrs[$table]['parent']['restrictions'] = "NOT NULL";

		$attrs[$table]['FOREIGN']['keys'] = array(
			"child",
			"parent");
		$attrs[$table]['FOREIGN']['ref'] = array(
			Category::getTableName() . "(" . Category::getPrimaryAttr() . ") ON UPDATE CASCADE ON DELETE CASCADE",
			Category::getTableName() . "(" . Category::getPrimaryAttr() . ") ON UPDATE CASCADE ON DELETE RESTRICT");

		return $attrs;
	}

	public static function getTableName() {
		return "ParentCategory";
	}

	public static function getPrimaryAttr() {
		return "child";
	}

	public static function getArray($root) {
		if(is_string($root))
			return array($root => self::recursiveArrayBuild($root));
		if(get_class($root) == "ParentCategory")
			return array($root->get("child") => self::recursiveArrayBuild($root->get("child")));
	}

	public static function getAncestors($base) {
		if(is_string($base)) {
			$db = new database();
			$r = $db->query("SELECT parent FROM " . self::getTableName() . " WHERE child = '" . $base . "';");
			if($r->num_rows == 1) {
				$parent = $r->fetch_assoc()['parent'];
				return array_merge(self::getAncestors($parent), array($base));
			} else {
				return array($base);
			}
		}
		if(get_class($base) == "ParentCategory")
			return self::getAncestors($base->get("child"));
	}

	private static function recursiveArrayBuild($rt) {
		$return = array();

		$db = new database();
		$db->open();
		$r = $db->query("SELECT * FROM " . self::getTableName() . " WHERE parent = '" . $rt . "';");
		for($i=0; $i<$r->num_rows; $i++) {
			$res = $r->fetch_assoc();
			$return[$res["child"]] = self::recursiveArrayBuild($res["child"]);
		}
		return $return;
	}
}

?>


