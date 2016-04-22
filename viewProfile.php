<?php include("htmlHeader.php"); ?>
<?php include("htmlTopbar.php"); ?>

<?php 

if(!isset($_GET["id"]))
  return;
?>

<html>
  <head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
    <title>Profile</title>
  </head>
  <body>
    <center><h1>My Profile</h1></center>

    <br>
    <br>

    <h2><?php 

    echo "Hello";

    $username = $_GET["id"];

    User::load(array("username"=> "kevincoco"));


    ?></h2>

<!-- Literally just load info like email bla bla and show her that we have a profile page. -->


    </center>
  </body>
</html>
