<?php

class Creditcard extends Entity {

	public static function getAttributeList() {
		return array('cardNum', 'username', 'description', 'defaultCard', 'cardName', 'expDate', 'cardType');
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

		$attrs[$table]['cardNum']['type'] = "VARCHAR(16)";
		$attrs[$table]['username']['type'] = "VARCHAR(20)";
		$attrs[$table]['description']['type'] = "TEXT";
		$attrs[$table]['defaultCard']['type'] = "INT(11)";
		$attrs[$table]['cardName']['type'] = "TEXT";
		$attrs[$table]['expDate']['type'] = "DATE";
		$attrs[$table]['cardType']['type'] = "TEXT";

		$attrs[$table]['username']['restrictions'] = "NOT NULL";
		$attrs[$table]['defaultCard']['restrictions'] = "NOT NULL";
		$attrs[$table]['cardName']['restrictions'] = "NOT NULL";
		$attrs[$table]['expDate']['restrictions'] = "NOT NULL";
		$attrs[$table]['cardType']['restrictions'] = "NOT NULL";

		$attrs[$table]['FOREIGN']['keys'] = 'username';
		$attrs[$table]['FOREIGN']['ref'] = User::getTableName() . '(' . User::getPrimaryAttr() . ') ON UPDATE CASCADE ON DELETE CASCADE';

		return $attrs;
	}

	public static function getTableName() {
		return "Creditcard";
	}

	public static function getPrimaryAttr() {
		return "cardNum";
	}
}

?>
