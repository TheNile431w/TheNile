<?php

include("cmpsc431w/Header.php");

$user1 = new Person(array(
	"username" => "johnDoe",
	"name" => "John Doe",
	"email" => "johndoe@test.com",
	"password" => "password",
	"income" => "2000",
	"gender" => "Male",
	"bday" => "1993/01/01"));

$user2 = new Person(array(
	"username" => "tutankamon",
	"name" => "King Tutankamon",
	"email" => "tutankamon@test.com",
	"password" => "tutankamonPass",
	"income" => "20000",
	"gender" => "Male",
	"bday" => "1500/05/01"));

$user3 = new Person(array(
	"username" => "kevinCohen",
	"name" => "Kevin Cohen",
	"email" => "kevin.cohen26@gmail.com",
	"password" => "kevinPass",
	"income" => "5000",
	"gender" => "Male",
	"bday" => "1995/01/26"));

$user4 = new Person(array(
	"username" => "alexaLewis",
	"name" => "Alexa Lewis",
	"email" => "alexa@lewis.com",
	"password" => "alexxaPassword",
	"income" => "4000",
	"gender" => "Female",
	"bday" => "1990/09/10"));

$user5 = new Person(array(
	"username" => "scottenand",
	"name" => "Scott Enand",
	"email" => "scott.enand@gmail.com",
	"password" => "scott123",
	"income" => "10000",
	"gender" => "Male",
	"bday" => "1994/05/18"));

$user6 = new Person(array(
	"username" => "jorgeJim",
	"name" => "Jorge Jimenez",
	"email" => "jorge@jimenez.com",
	"password" => "jorge1234",
	"income" => "3510",
	"gender" => "Male",
	"bday" => "1998/10/10"));

$user7 = new Person(array(
	"username" => "yusan",
	"name" => "Yusan Lin",
	"email" => "yusanlin@gmail.com",
	"password" => "yusanPass123",
	"income" => "16500",
	"gender" => "Female",
	"bday" => "1990/08/20"));

$user8 = new Person(array(
	"username" => "johnDoe",
	"name" => "John Doe",
	"email" => "john@doe.com",
	"password" => "johnPass",
	"income" => "1000",
	"gender" => "Male",
	"bday" => "1996/11/02"));

$user9 = new Person(array(
	"username" => "nickPatel",
	"name" => "Nick Patel",
	"email" => "nick.patel@gmail.com",
	"password" => "patelNick",
	"income" => "8800",
	"gender" => "Male",
	"bday" => "1995/12/12"));

$user10 = new Person(array(
	"username" => "josephDotz",
	"name" => "Joseph Dotzel",
	"email" => "joseph.dotzel@gmail.com",
	"password" => "dotzelPass",
	"income" => "2000",
	"gender" => "Male",
	"bday" => "1992/01/01"));

$user11 = new Company(array(
	"username" => "pepsico",
	"name" => "PepsiCo",
	"email" => "pepsico@gmail.com",
	"password" => "pepsico",
	"income" => "1000000",
	"company_cat" => "Food", 
	"PoC" => "kevinCohen"
	));

$user12 = new Company(array(
	"username" => "tutankCompany",
	"name" => "Tutankamon Incorporated",
	"email" => "tutankamonInc@gmail.com",
	"password" => "tutankCompany",
	"income" => "10000000",
	"company_cat" => "Antiques", 
	"PoC" => "tutankamon"));

$user13 = new Company(array(
	"username" => "microsoft",
	"name" => "Microsoft ",
	"email" => "microsoft@outlook.com",
	"password" => "microsoftPass",
	"income" => "5000000",
	"company_cat" => "Software", 
	"PoC" => "scottenand"));

$user14 = new Company(array(
	"username" => "google",
	"name" => "Google",
	"email" => "google@gmail.com",
	"password" => "googlePass",
	"income" => "35000000",
	"company_cat" => "Innovative Software", 
	"PoC" => "jorgeJim"));

$user15 = new Company(array(
	"username" => "facebook",
	"name" => "Facebook",
	"email" => "fb@facebook.com",
	"password" => "facebookPass",
	"income" => "67000000",
	"company_cat" => "Social Media", 
	"PoC" => "yusan"));




?>
