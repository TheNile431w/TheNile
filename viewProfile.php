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
    <center><h1 style="color:white">View Profile</h1></center>

    <br>
    <br>
    <center>
    <h2 style="color:white"><?php 

    $username = $_GET["id"];
    $pageUser = NULL;

    try {
      $pageUser = new User(array("username"=> $username), false);
    } catch(Exception $e) {}


    echo $pageUser->get("name");

    ?></h2>
    </center>

   
  <div id="roomsDiv" class="row" style="margin-top:50px;padding-left:75px;font-size:1.5em">

    <!-- <div class="col-md-6"> -->
      <h2 style="color:white">List of items being sold</h2>
      <!-- <img src="/images/514RBSGMB5L._SY300_QL70_.jpg"/> -->
      
      <?php
        $product = Product::load("SELECT * FROM Product WHERE sold_by = '".$pageUser->get("username")."';");
        //$product = Product::load(array("sold_by"=>$pageUser->get("username")));
        echo prodRow($product);
        /*
        for($i=0;$i<count($product);$i = $i+1)
        {
          echo "<li>".$product[$i]->get("pname")."</li>";
          echo "<img src=/images/".$product[$i]->get('img')." />";
          //echo  $product[$i]->get('img');
        }*/
    ?>
     
    
    
    <br>
  </div>
  <br><br>
  <center>
    <a href="mailto:<?php echo($pageUser->get('email')); ?>" >
      <div class="btn btn-primary" style="color:white;font-size:1.5em;text-align:center" >Contact</div>
      </a>
    </center>

  </body>
</html>
