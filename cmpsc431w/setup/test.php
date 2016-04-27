<?php

require_once("../Header.php");

$s = new Category(array("name"=>"all", "description"=>"All Products"));

$ss = Category::load(array('name'=>'all'));

var_dump($ss);

?>