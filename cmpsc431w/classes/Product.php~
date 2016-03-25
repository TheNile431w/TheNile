<?php

class Product extends Entity {
	public function __construct($args) {
		parent::__construct($args);
	}

	public static function getAttributeList() {
		return array('pid', 'pname', 'location', 'description', 'buy_out', 'sold_by', 'img');
	}

	/**
	 * Gets SQL Info in 3-dimensional array format
	 * INFO		: 'type' : PRIMARY / TEXT / REAL / INT / etc.
	 * 			: 'restrictions' : string : NOT NULL / etc.
	 * 			: 'foreign' : string : Table_Name(attr) [ ON UPDATE ___ ] [ ON DELETE ___ ]
	 * @return array [ TABLE_NAME ] [ ATTR_NAME ] [ INFO ] = STRING VALUE
	 */
	protected function getSQLInfo() {
		return array_merge(self::getStaticSQLInfo(), $this->attrs);
	}

	protected static function getStaticSQLInfo() {
		$attrs = array();
		$table = self::getTableName();

		$attrs[$table]['pid']['type'] = "KEY";
		$attrs[$table]['pname']['type'] = "TEXT";
		$attrs[$table]['location']['type'] = "TEXT";
		$attrs[$table]['description']['type'] = "TEXT";
		$attrs[$table]['buy_out']['type'] = "REAL";
		$attrs[$table]['sold_by']['type'] = "VARCHAR(20)";
		$attrs[$table]['img']['type'] = "TEXT";

		$attrs[$table]['pid']['restrictions'] = "AUTO_INCREMENT";
		$attrs[$table]['pname']['restrictions'] = "NOT NULL";
		$attrs[$table]['description']['restrictions'] = "NOT NULL";
		$attrs[$table]['buy_out']['restrictions'] = "NOT NULL";
		$attrs[$table]['sold_by']['restrictions'] = "NOT NULL";

		$attrs[$table]['sold_by']['foreign'] = User::getTableName() . "(" . User::getPrimaryAttr() . ") ON UPDATE CASCADE ON DELETE RESTRICT";

		return $attrs;
	}

	protected static function getTableName() {
		return "Product";
	}

	protected static function getPrimaryAttr() {
		return "pid";
	}

	public static function scrape($url, $person, $description = NULL) {
		//$html = file_get_contents($url);
		$dom = file_get_html(trim($url));
		
		echo $url . "\n";

		$arr['pname'] = $dom->find("span[id=productTitle]", 0)->innerText() . "\n";
		$img = $dom->find("img[id=landingImage]", 0)->src;
		$temp = pathinfo($img)['basename'];


		//echo "hola \n";
		//$result = $dom->find("#fbSection ul",0)->innerText();
		// echo($url . ": productDescriptionWrapper: " . strpos($html, "productDescriptionWrapper"));
		//var_dump($result);
		//return;


		$old_path = getcwd();
		chdir("images");
		$output = shell_exec('curl -O ' . $img);
		chdir($old_path);
		

	

		$arr['img'] = $temp;
		$arr['location'] = "State College";
		if(is_null($description)) {
			$arr['description'] = trim($dom->find("#feature-bullets ul",0)->innerText());
		} else {
			$arr['description'] = $description;
		}
		$tmp = $dom->find("span[id=priceblock_ourprice]", 0);
		if(is_null($tmp))
			$tmp = $dom->find("span[id=priceblock_saleprice]", 0);
		if(is_null($tmp))
			$tmp = rand(2000, 10000) / 100;
		else
			$tmp = trim(explode("-", $tmp->innerText())[0], " \t\n\r\0\x0B\$");
		$arr['buy_out'] = $tmp;
		$arr['sold_by'] = $person;

		return $arr;
	}
}

include("Purchase.php");
include("Auction.php");

?>
