<?php

class UserRating extends Entity {

	public static function getAttributeList() {
		return array('rater', 'ratee', 'rating', 'description');
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

		$attrs[$table]['rater']['type'] = "VARCHAR(20)";
		$attrs[$table]['ratee']['type'] = "VARCHAR(20)";
		$attrs[$table]['rating']['type'] = "INT(11)";
		$attrs[$table]['description']['type'] = "TEXT";

		$attrs[$table]['FOREIGN']['keys'] = array(
			'rater',
			'ratee');
		$attrs[$table]['FOREIGN']['ref'] = array(
			User::getTableName() . "(" . User::getPrimaryAttr() . ") ON UPDATE CASCADE ON DELETE RESTRICT",
			User::getTableName() . "(" . User::getPrimaryAttr() . ") ON UPDATE CASCADE ON DELETE CASCADE");

		return $attrs;
	}

	public static function getTableName() {
		return "UserRating";
	}

	public static function getPrimaryAttr() {
		return "rater, ratee";
	}
}

?>
