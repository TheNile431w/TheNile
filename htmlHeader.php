<?php

require_once("Header.php");

error_reporting(-1);
ini_set('display_errors', 'On');

define("IMAGE_FOLDER", "images/");
define("DEEP_BLUE", "#492DA2");
define("LIGHT_BLUE", "#ddddff");
define("DARK_BLUE", "#000066");

$user = FALSE;
$msg = FALSE;

if(isset($_COOKIE["username"]) AND !empty($_COOKIE["username"])) {
  try {
    $user = new User(array("username" => $_COOKIE["username"]));
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
      $user = $candidate;
    } else {
      $msg = "You have entered an incorrect username/password combination.";
    }
  } catch(Exception $e) {
    $msg = "You have entered an incorrect username.";
  }
} elseif(isset($_GET["logout"]) AND $_GET["logout"] == "true") {
  $user = FALSE;
  $_COOKIE["username"] = "";
  unset($_COOKIE["username"]);
  setcookie("username", NULL, -1, "/");
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

function productPreview($item, $overlay=NULL) {
  return '
  <div class="col-xs-6 col-sm-4 col-md-3">
    <div class="thumbnail" style="background-color: '.LIGHT_BLUE.'">
      <a href="product.php?pid='.$item->get('pid').'">
        <img src="'. IMAGE_FOLDER . str_replace("%2", "%252", $item->get("img")) .'" style="max-height:250px;border:0px;" class="productImg" />
        '.(is_null($overlay) ? "" : '
          <span class="productText"><h4 style="margin:5px;max-width:220px;background:rgb(0,0,0);background:rgba(0,0,0,0.7);">'.$overlay.'</h4></span>
        ').'
      </a>
      <div class="caption">
        <h3 class="hideContent-4">'.$item->get("pname").'</h3>
        <hr />
        <div id="desc'.$item->get('pid').'" class="content hideContent-6">'.prettyDescription($item->get("description")).'</div>
      </div>
    </div>
  </div>';
}

function prodRow($items, $show = 4) {
  $products = "";
  foreach($items as $i) {
    if(!is_null($i) AND !empty($i)) {
      $products .= '
        <li class="prodli" id="'.$i->get('pid').'">
          <img src="'. IMAGE_FOLDER . str_replace("%2", "%252", $i->get("img")) .'" class="carouselImg" />
          <span class="carouselText"><h4 style="width:140px;background:rgb(0,0,0);background:rgba(0,0,0,0.7);">'.$i->get("pname").'</h4></span>
        </li>';
    }
  }
  return '
<div class="custom-container rowContainer">
  <a href="#" class="prev">&lsaquo;</a>
  <div class="carousel">
    <ul>
    '.$products.'
    </ul>
  </div>
  <a href="#" class="next">&rsaquo;</a>
  <div class="clear"></div>
</div>
<script type="text/javascript">
$(document).ready(function() {
  $(".rowContainer .carousel").jCarouselLite({
    btnNext: ".rowContainer .next",
    btnPrev: ".rowContainer .prev",
    visible: '.$show.',
    scroll: '.($show-1).',
    speed: 650
  });
});
$(".prodli").on("click", function(e) {
  var id=($(e.target).closest("li").attr("id"));
  window.location = "product.php?pid="+id;
});
</script>';
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
<script type="text/javascript" src="Dependencies/jquery.jcarousellite.min.js"></script>

<style type="text/css">
.dropdown-submenu {
    position: relative;
}

.dropdown-submenu > .dropdown-menu {
    top: 0;
    left: 100%;
    margin-top: -6px;
    margin-left: -1px;
    -webkit-border-radius: 0 6px 6px 6px;
    -moz-border-radius: 0 6px 6px;
    border-radius: 0 6px 6px 6px;
}

.dropdown-submenu:hover > .dropdown-menu {
    display: block;
}

.dropdown-submenu > a:after {
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

.dropdown-submenu:hover > a:after {
  border-left-color: #fff;
}

.dropdown-submenu.pull-left {
  float: none;
}

.dropdown-submenu.pull-left > .dropdown-menu {
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
  background: url(images/bg.jpg);
  background-position: top center;
  background-repeat: repeat;
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

.transBlueBack {
  background:rgba(<?php echo(substr(DARK_BLUE, 1, 2) . ',' . substr(DARK_BLUE, 3, 2) . ',' . substr(DARK_BLUE, 5, 2) . ',.8'); ?>);
  color:white;
  border-radius: 5px;
}

/* CAROUSEL */
.rowContainer .carousel {
  border: 1px solid #bababa;
  border-radius: 10px;
  background-color: ghostwhite;
  float: left;
  padding-left: 10px;
}
.rowContainer .carousel>ul>li>img {
  width: 150px;
  height: 118px;
  vertical-align:middle;
  margin: 10px 10px 10px 0;
  border-radius: 5px;
}

.rowContainer a.prev, .rowContainer a.next {
  display: block;
  width: 26px;
  height: 30px;
  line-height: 1;
  background-color: #333333;
  color: ghostwhite;
  text-decoration: none;
  font-family: Arial, sans-serif;
  font-size: 25px;
  border-radius: 8px;
  float: left;
}
.rowContainer a.prev {
  margin: 50px -5px 0 0; text-indent: 7px;
}
.rowContainer a.next {
  margin: 50px 0 0 -5px; text-indent: 10px;
}
.rowContainer a.prev:hover, .rowContainer a.next:hover {
  background-color: #666666;
}
.carouselImg {
  cursor:pointer;
}
.carouselImg + .carouselText {
  display:none;
}
.carouselImg:hover + .carouselText {
  display:inline;
  cursor:pointer;
}
.carouselText {
  color:white;
  font:Helvetica, Sans-Serif, 14pt, bold;
  padding:10px;
  display:box;
  position:relative;
  left:5px;
  top:-155px;
  width:140px;
  overflow:hidden;
}
.carouselText:hover {
  display:inline;
  cursor:pointer;
}

.productImg + .productText {
  display:none;
}
.productImg:hover + .productText {
  display:inline;
  cursor:pointer;
}
.productText:hover {
  display:inline;
  cursor:pointer;
}
.productText {
  color:white;
  font:Helvetica, Sans-Serif, 14pt, bold;
  border:10px;
  display:box;
  position:absolute;
  left:27px;
  top:30px;
  max-width:230px;
  overflow:hidden;
}


/* STAR RATING */
.rating {
  float:left;
}
.rating:not(:checked) > input {
  display:none;
  clip:rect(0,0,0,0);
}
.rating:not(:checked) > label {
  float:right;
  width:1em;
  padding:0 .1em;
  overflow:hidden;
  white-space:nowrap;
  cursor:pointer;
  font-size:200%;
  line-height:1.2;
  color:#ddd;
  text-shadow:1px 1px #bbb, 2px 2px #666, .1em .1em .2em rgba(0,0,0,.5);
}
.rating:not(:checked) > label:before {
  content: '★ ';
}
.rating > input:checked ~ label {
  color: #f70;
  text-shadow:1px 1px #c60, 2px 2px #940, .1em .1em .2em rgba(0,0,0,.5);
}
.rating:not(:checked) > label:hover,
.rating:not(:checked) > label:hover ~ label {
  color: gold;
  text-shadow:1px 1px goldenrod, 2px 2px #B57340, .1em .1em .2em rgba(0,0,0,.5);
}
.rating > input:checked + label:hover,
.rating > input:checked + label:hover ~ label,
.rating > input:checked ~ label:hover,
.rating > input:checked ~ label:hover ~ label,
.rating > label:hover ~ input:checked ~ label {
  color: #ea0;
  text-shadow:1px 1px goldenrod, 2px 2px #B57340, .1em .1em .2em rgba(0,0,0,.5);
}
.rating > label:active {
  position:relative;
  top:2px;
  left:2px;
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


