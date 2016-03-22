<?php

include("cmpsc431w/Header.php");

$p = new Person(array(
	"username" => "testuser",
	"name" => "John Doe",
	"email" => "scott.enand@gmail.com",
	"password" => "password",
	"income" => "2000",
	"gender" => "Male",
	"bday" => "1993/01/01"));

// print_r(Person::getAttributeList());

$c = new Category(array(
	"name" => "All",
	"description" => "All Products"));

$cc = new Category(array(
	"name" => "n",
	"description" => "d",
	"parent" => "All"));

$p = new Purchase(Purchase::scrape("http://www.amazon.com/gp/product/B000WUPKGM?keywords=pharaoh&qid=1458594770&ref_=sr_1_5&sr=8-5", "testuser"));

// $a = new Auction(Auction::scrape("URL", "PERSON.username", description = NULL));

new PartOf(array(
	"category" => "all",
	"pid" => $p->get("pid")));



?>
