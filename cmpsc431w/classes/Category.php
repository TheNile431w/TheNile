<?php

class Category extends Entity {
	public function __construct($args, $new) {
		parent::__construct($args, $new);

		if(isset($args['parent'])) {
			$p = new ParentCategory(array("child"=>$this->getID(), "parent"=>$args['parent']));
		}
	}

	public static function getAttributeList() {
		return array('name', 'description');
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

		$attrs[$table]['name']['type'] = "VARCHAR(20)";
		$attrs[$table]['description']['type'] = "TEXT";

		$attrs[$table]['description']['restrictions'] = "NOT NULL";

		return $attrs;
	}

	public static function getTableName() {
		return "Category";
	}

	public static function getPrimaryAttr() {
		return "name";
	}
}

?>
