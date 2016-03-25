<?php

require_once("Header.php");

define("IMAGE_FOLDER", "images/");
define("DEEP_BLUE", "#492DA2");
define("LIGHT_BLUE", "#ddf");
define("DARK_BLUE", "#006");

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

function prettyDescription($s) {
    $replacement = strpos($s, "replacementPartsFitmentBullet");
    if($replacement != FALSE) {
        $s = substr($s, 0, $replacement - 8) . substr($s, strpos(substr($s, $replacement), "</li>") + 8);
    }
    return $s;
    $dom = str_get_html($s);
    $replacement = $dom->find("#replacementPartsFitmentBullet", 0);
    if($replacement != FALSE) {
        $replacement->outertext = "";
    }
    return $dom->save();
}

function productPreview($item) {
    return '<div class="col-xs-6 col-sm-4 col-md-3">
        <div class="thumbnail" style="background-color: '.LIGHT_BLUE.'">
            <a href="product.php?pid='.$item->get('pid').'">
                <img src="'. IMAGE_FOLDER . str_replace("%2", "%252", $item->get("img")) .'" style="max-height:250px;border:0px;" />
            </a>
            <div class="caption">
                <h3 class="hideContent-4">'.$item->get("pname").'</h3>
                <hr />
                <div id="desc'.$item->get('pid').'" class="content hideContent-6">'.prettyDescription($item->get("description")).'</div>
            </div>
        </div>
    </div>';
}

function startsWith($haystack, $needle) {
    return $needle === "" || strrpos($haystack, $needle, -strlen($haystack)) !== false;
}

function endsWith($haystack, $needle) {
    return $needle === "" || (($temp = strlen($haystack) - strlen($needle)) >= 0 && strpos($haystack, $needle, $temp) !== false);
}

?>

<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />

<link rel="stylesheet" type="text/css" href="Dependencies/bootstrap/css/bootstrap.min.css" />
<link rel="stylesheet" type="text/css" href="Dependencies/bootstrap/css/bootstrap-theme.min.css" />
<link rel="stylesheet" type="text/css" href="Dependencies/jquery-ui/jquery-ui.min.css" />
<script type="text/javascript" src="Dependencies/jquery/jquery.min.js"></script>
<script type="text/javascript" src="Dependencies/bootstrap/js/bootstrap.min.js"></script>
<script type="text/javascript" src="Dependencies/jquery-ui/jquery-ui.min.js"></script>

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
nav#topbar {
    background-image: -webkit-linear-gradient(top,<?php echo(DEEP_BLUE); ?> 0,<?php echo(LIGHT_BLUE); ?> 100%);
    background-image: -o-linear-gradient(top,<?php echo(DEEP_BLUE); ?> 0,<?php echo(LIGHT_BLUE); ?> 100%);
    background-image: -webkit-gradient(linear,top,bottom,<?php echo(DEEP_BLUE); ?>,<?php echo(LIGHT_BLUE); ?>);
    background-image: linear-gradient(to bottom,<?php echo(DEEP_BLUE); ?> 0,<?php echo(LIGHT_BLUE); ?> 100%);
    
}
body {
    background: url(images/bg2.jpg), url(images/bg2-repeat.jpg);
    background-position: top center, center;
    background-repeat: no-repeat, repeat-y;
}
.darkblue {
    color: <?php echo(DARK_BLUE); ?>;
}
.deepblue {
    color: <?php echo(DEEP_BLUE); ?>;
}
.lightblue {
    color: <?php echo(LIGHT_BLUE); ?>;
}
.bg-darkblue {
    background-color: <?php echo(LIGHT_BLUE); ?>;
}
.bg-darkblue {
    background-color: <?php echo(DARK_BLUE); ?>;
}
.bg-deepblue {
    background-color: <?php echo(DEEP_BLUE); ?>;
}
.hideContent-6 {
    overflow: hidden;
    line-height: 1em;
    max-height: 6em;
}
.showContent {
    line-height: 1em;
    height: auto;
}
.hideContent-4 {
    overflow: hidden;
    line-height: 1em;
    max-height: 4em;
}
.jumbotron {
    /* Safari 4-5, Chrome 1-9 */
    background: -webkit-gradient(linear, top, bottom, from(rgba(221, 221, 255, 0.25)), color-stop(0.5, rgba(73, 45, 161, 1)), to(rgba(221, 221, 255, 0.25)));
    /* Safari 5.1+, Chrome 10+ */
    background: -webkit-linear-gradient(top, rgba(221, 221, 255, 0), rgba(73, 45, 161, 1), rgba(221, 221, 255, 0));
    /* Firefox 3.6+ */
    background: -moz-linear-gradient(top, rgba(221, 221, 255, 0), rgba(73, 45, 161, 1), rgba(221, 221, 255, 0));
    /* IE 10 */
    background: -ms-linear-gradient(top, rgba(221, 221, 255, 0), rgba(73, 45, 161, 1), rgba(221, 221, 255, 0));
    /* Opera 11.10+ */
    background: -o-linear-gradient(top, rgba(221, 221, 255, 0), rgba(73, 45, 161, 1), rgba(221, 221, 255, 0));
}
.star-rating {
  font-size: 0;
  white-space: nowrap;
  display: inline-block;
  width: 250px;
  height: 50px;
  overflow: hidden;
  position: relative;
  background: url('data:image/svg+xml;utf-8,<svg version="1.1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px" width="20px" height="20px" viewBox="0 0 20 20" enable-background="new 0 0 20 20" xml:space="preserve"><polygon fill="#DDDDDD" points="10,0 13.09,6.583 20,7.639 15,12.764 16.18,20 10,16.583 3.82,20 5,12.764 0,7.639 6.91,6.583 "/></svg>');
  background-size: contain;
}
.star-rating i {
  opacity: 0;
  position: absolute;
  left: 0;
  top: 0;
  height: 100%;
  width: 20%;
  z-index: 1;
  background: url('data:image/svg+xml;utf-8,<svg version="1.1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px" width="20px" height="20px" viewBox="0 0 20 20" enable-background="new 0 0 20 20" xml:space="preserve"><polygon fill="#FFDF88" points="10,0 13.09,6.583 20,7.639 15,12.764 16.18,20 10,16.583 3.82,20 5,12.764 0,7.639 6.91,6.583 "/></svg>');
  background-size: contain;
}
.star-rating input {
  -moz-appearance: none;
  -webkit-appearance: none;
  opacity: 0;
  display: inline-block;
  width: 20%;
  height: 100%;
  margin: 0;
  padding: 0;
  z-index: 2;
  position: relative;
}
.star-rating input:hover + i,
.star-rating input:checked + i {
  opacity: 1;
}
.star-rating i ~ i {
  width: 40%;
}
.star-rating i ~ i ~ i {
  width: 60%;
}
.star-rating i ~ i ~ i ~ i {
  width: 80%;
}
.star-rating i ~ i ~ i ~ i ~ i {
  width: 100%;
}
</style>

<script type="text/javascript">

$(document).ready(function() {
    $(".showHide").on("click", function() {
        var test = $(this).parent().find(".content");
        $($(this).parent().find(".content")[0]).switchClasses("hideContent", "showContent", 400);
    });
});

</script>
