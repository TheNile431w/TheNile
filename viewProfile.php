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

   // var_dump($GLOBALS['user']);

    try {
      $pageUser = new User(array("username"=> $username), false);
    } catch(Exception $e) {}


    echo $pageUser->get("name");

     $arr = UserRating::load("SELECT * FROM UserRating WHERE ratee='".$pageUser->get('username')."'");

     $sum = 0;
     for($i=0;$i<count($arr);$i++)
     {
        $sum +=$arr[$i]->get('rating'); 
     }
     
     if(count($arr) !=0)
     {
       $average = $sum/count($arr);

       $average = round($average,2);

       echo "<br>";
       echo "Average Rating: $average";
    }
    // var_dump($arr[]);
    ?></h2>    
              <a href="mailto:<?php echo($pageUser->get('email')); ?>" >
      <div class="btn btn-primary" style="color:white;font-size:1.5em;text-align:center" >Contact</div>
      </a>         
    </center>


  <div id="listItems" class="row" style="margin-top:50px;padding-left:75px;font-size:1.5em">

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
  <hr>
                  
          <h2 style="color:white">Rate this user</h2>           
          <div class="rating">
              <input type="radio" id="star5" name="rating" value="5"><label for="star5" title="Rocks!">5 stars</label>
              <input type="radio" id="star4" name="rating" value="4"><label for="star4" title="Pretty good">4 stars</label>
              <input type="radio" id="star3" name="rating" value="3"><label for="star3" title="Meh">3 stars</label>
              <input type="radio" id="star2" name="rating" value="2"><label for="star2" title="Kinda bad">2 stars</label>
              <input type="radio" id="star1" name="rating" value="1"><label for="star1" title="Sucks big time">1 star</label>
          </div>
          <br>
          <br>
          <h2 style="color:white">Description (optional)</h2>           
          <textarea id="description" class="form-control" style="width:350px;height:100px"></textarea>       
                  
          <br><br>
  <center>
    </center>
      <button class="btn btn-primary" style="color:white;font-size:1.5em" onclick="submitRating()">Submit Rating</button>
      <br> 
      <br> 
      <script>  

      function submitRating(){
        var ratee = <?php echo "'".$pageUser->get('username')."'" ?>;
        var rater = <?php echo "'".$GLOBALS['user']->get('username')."'" ?>;
        var rating = document.querySelector('input[name="rating"]:checked').value;
        var description = document.getElementById("description").value;

        jQuery.ajax({
        url: "/handleSignup.php?verifyRate="+rater,
        error: function(data){
       
        },
        success: function(data){

          if(data == 1){
            alert("A rating with the logged in user has already been recorded.");
            return false;
          }
          else{
            jQuery.ajax({
            url: "/handleSignup.php?rate="+rater +"&ratee="+ratee+"&rating="+rating+"&description="+description,
            error: function(data){
             
            },
            success: function(data){
            
             alert("Rating submitted!");   

              window.location.href = "/viewProfile.php?id="+ratee;       
              }
              // go to my profile.
                   
            });
          } 
        }
    });
       
  }
  </script>   
  </body>
</html>
