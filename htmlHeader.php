<?php

require_once("Header.php");

define("IMAGE_FOLDER", "images/");

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
} elseif(isset($_GET["logout"]) AND $_GET["logout"] == "true") {
	$user = FALSE;
	unset($_COOKIE["username"]);
	$msg = "Logged out.";
}

?>

<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />

<link rel="stylesheet" type="text/css" href="Dependencies/bootstrap/css/bootstrap.min.css" />
<link rel="stylesheet" type="text/css" href="Dependencies/bootstrap/css/bootstrap-theme.min.css" />
<script type="text/javascript" src="Dependencies/jquery/jquery.min.js"></script>
<script type="text/javascript" src="Dependencies/bootstrap/js/bootstrap.min.js"></script>

<style type="text/css">
.dropdown-submenu
{
    position: relative;
}

.dropdown-submenu > .dropdown-menu
{
    top: 0;
    left: 100%;
    margin-top: -6px;
    margin-left: -1px;
    -webkit-border-radius: 0 6px 6px 6px;
    -moz-border-radius: 0 6px 6px;
    border-radius: 0 6px 6px 6px;
}

.dropdown-submenu:hover > .dropdown-menu
{
    display: block;
}

.dropdown-submenu > a:after
{
    display: block;
    content: " ";
    float: right;
    width: 0;
    height: 0;
    border-color: transparent;
    border-style: solid;
    border-width: 5px 0 5px 5px;
    border-left-color: #ccc;
    margin-top: 5px;
    margin-right: -10px;
}

.dropdown-submenu:hover > a:after
{
    border-left-color: #fff;
}

.dropdown-submenu.pull-left
{
    float: none;
}

.dropdown-submenu.pull-left > .dropdown-menu
{
    left: -100%;
    margin-left: 10px;
    -webkit-border-radius: 6px 0 6px 6px;
    -moz-border-radius: 6px 0 6px 6px;
    border-radius: 6px 0 6px 6px;
}
</style>

