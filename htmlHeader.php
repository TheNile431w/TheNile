<?php

require_once("Header.php");

$user = FALSE;
$msg = FALSE;

if(isset($_COOKIE["username"])) {
	try {
		$user = new Person(array("username" => $_COOKIE["username"]));
	} catch(Exception $e) {
		try {
			$user = new Auction(array("username" => $_COOKIE["username"]));
		} catch(Exception $e) {
			$msg = "Invalid user logged in. Logging out.";
			unset($_COOKIE["username"]);
		}
	}
}
if(isset($_POST['login_username']) AND isset($_POST['login_password']) AND !empty($_POST['login_username']) AND !empty($_POST['login_password'])) {
	try {
		$candidate = new User(array("username"=>$_POST['login_username']));
		if($candidate->get("password") == $_POST['login_password']) {
			setcookie("username", $candidate->get("username"), strtotime("+3 weeks"), "/");
		} else {
			$msg = "You have entered an incorrect username/password combination.";
		}
	} catch(Exception $e) {
		$msg = "You have entered an incorrect username.";
	}
} elseif(isset($_POST["logout"]) AND $_POST["logout"] == "true") {
	$user = FALSE;
	unset($_COOKIE["username"]);
	$msg = "Logged out.";
}

?>

<HTML>
<head>

<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />

<link rel="stylesheet" type="text/css" href="Dependencies/bootstrap/css/bootstrap.min.css" />
<link rel="stylesheet" type="text/css" href="Dependencies/bootstrap/css/bootstrap-theme.min.css" />
<script type="text/javascript" src="Dependencies/jquery/jquery.min.js" />
<script type="text/javascript" src="Dependencies/bootstrap/js/bootstrap.min.js" />

