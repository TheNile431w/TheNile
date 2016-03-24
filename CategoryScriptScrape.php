<?php

include("cmpsc431w/Header.php");

// print_r(Person::getAttributeList());

$c = new Category(array(
	"name" => "All",
	"description" => "All Products"));

$c1 = new Category(array(
	"name" => "Fashion",
	"description" => "Egyptian Fashion Items",
	"parent" => "All"));

$c2 = new Category(array(
	"name" => "Clothing",
	"description" => "Egyptian Apparel",
	"parent" => "Fashion"));
$c3 = new Category(array(
	"name" => "Jewelry",
	"description" => "Fancy Egyptian Jewelry",
	"parent" => "Fashion"));
$c4 = new Category(array(
	"name" => "Footwear",
	"description" => "Fancy Egyptian Footwear (and sandals)",
	"parent" => "Fashion"));
$c5 = new Category(array(
	"name" => "Sandals",
	"description" => "Sandals for your everyday use",
	"parent" => "Footwear"));
$c6 = new Category(array(
	"name" => "Shoes",
	"description" => "Egyptian shoes",
	"parent" => "Footwear"));

$c7 = new Category(array(
	"name" => "Necklaces",
	"description" => "Egyptian Necklaces",
	"parent" => "Jewelry"));
$c8 = new Category(array(
	"name" => "Rings",
	"description" => "Egyptian rings",
	"parent" => "Jewelry"));
$c9 = new Category(array(
	"name" => "Earings",
	"description" => "Egyptian Earings",
	"parent" => "Jewelry"));
$c10 = new Category(array(
	"name" => "Electronics",
	"description" => "Electronics",
	"parent" => "All"));

$c11 = new Category(array(
	"name" => "Entertainment",
	"description" => "Egyptian Entertainment",
	"parent" => "Electronics"));

$c12 = new Category(array(
	"name" => "Music",
	"description" => "Egyptian Folk Music",
	"parent" => "Entertainment"));
$c13 = new Category(array(
	"name" => "Movies",
	"description" => "Egyptian Movies",
	"parent" => "Entertainment"));
$c14 = new Category(array(
	"name" => "Art",
	"description" => "Egyptian Art",
	"parent" => "All"));
$c15 = new Category(array(
	"name" => "Sculptures",
	"description" => "Egyptian Sculptures",
	"parent" => "Art"));

$c16 = new Category(array(
	"name" => "Paintings",
	"description" => "Egyptian Paintings",
	"parent" => "Art"));

$c17 = new Category(array(
	"name" => "Pottery",
	"description" => "Egyptian Pottery",
	"parent" => "Art"));
$c18 = new Category(array(
	"name" => "Outdoors",
	"description" => "Egyptian Outdoor Items",
	"parent" => "All"));
$c19 = new Category(array(
	"name" => "Toys",
	"description" => "Every days toys!",
	"parent" => "All"));
$c20 = new Category(array(
	"name" => "Food",
	"description" => "Egyptian food",
	"parent" => "All"));

?>
