<HTML>
  <head>
    <?php include("htmlHeader.php");
    error_reporting(E_ALL);
    ?>

    <script type="text/javascript">
        function verify() {
            if($('#new_rating_description').val().length == 0) {
                $('#new_rating_description').parent().addClass('has-error');
                return false;
            } if(!$("input[name='rating']:checked").val()) {
                return false;
            }
            return true;
        }
        $(document).ready(function() {
            $("#new_rating_description").on("change", function() {
                $(this).parent().removeClass('has-error');
            });
        });
    </script>

    <title>TheNile Main</title>

    <?php
    $item = NULL;
    $isPurchase = FALSE;
    $isAuction = FALSE;
    if(isset($_GET['pid'])) {
        try {
            $item = new Purchase(array("pid" => $_GET["pid"]));
            $isPurchase = TRUE;
        } catch(Exception $e) {
            try {
                $item = new Auction(array("pid" => $_GET["pid"]));
                $isAuction = TRUE;
            } catch(Exception $e) { }
        }
    }

    if(isset($_POST['bid']) AND !is_null($item) AND $user != FALSE) {
        new PurchasedBy(array(
            'pid' => $item->get('pid'),
            'username' => $user->get('username'),
            'time' => date("Y/m/d H:i:s"),
            'unitPrice' => $_POST['bid'],
            'qty' => "1"));
    }

    if(isset($_POST['subReview']) AND !is_null($item) AND $GLOBALS['user'] != FALSE AND isset($_POST['rating']) AND is_numeric($_POST['rating']) AND $_POST['rating'] >= 1 AND $_POST['rating'] <= 5 AND isset($_POST['rating_description']) AND !empty($_POST['rating_description'])) {
        try {
            $db = new database();
            $desc = $db->real_escape_string($_POST['rating_description']);
            $n = new RatedBy(array(
                'pid' => $item->get('pid'),
                'username' => $user->get('username'),
                'rating' => $_POST['rating'],
                'description' => $desc,
                'time' => 'now()'));
        } catch(Exception $e) {
            var_dump($e);
        }
    }

    ?>
  </head>

  <body>
    <?php include("htmlTopbar.php"); ?>
    <div class="jumbotron">
      <div style="margin:20px;">
        <h1>
          Welcome to The Nile!
        </h1>
        <h4>
          <i>
            Where the deals flow to you!
          </i>
        </h4>
      </div>
    </div>
    <hr style="width:90%;" />
    <?php
    if(!is_null($item)) {
      ?>
      <div class="row">
        <div class="col-md-4">
          <div style="width:100%;">
            <img class="pull-right" src="<?php echo(IMAGE_FOLDER . str_replace('%2', '%252', $item->get('img'))); ?>">
          </div>
        </div>
        <div class="col-md-8" style="background-color: <?php echo(LIGHT_BLUE); ?>; border-radius: 5px;">
          <h2>
            <?php echo($item->get('pname')); ?>
          </h2>
          <h4>
            Price: <font style="font-weight: bold; font-size:larger;">$<?php echo($item->get("buy_out")); ?></font>
          </h4>
          <div class="content">
            <?php echo(prettyDescription($item->get('description'))); ?>
          </div>
        </div>
	    <div class="col-md-4">
	      <div style="width:100%;">
		    <img class="pull-right" src="<?php echo(IMAGE_FOLDER . str_replace('%2', '%252', $item->get('img'))); ?>">
		  </div>
	    </div>
	    <div class="col-md-8" style="background-color: <?php echo(LIGHT_BLUE); ?>; border-radius: 5px;">
		  <h2>
			<?php echo($item->get('pname')); ?>
		  </h2>
          <?php 
            if($isPurchase) {
              ?>
    		  <h4>
    		  	Price: <font style="font-weight: bold; font-size:larger;">$<?php echo($item->get("buy_out")); ?></font>
    		  </h4>
              <?php
            } elseif($isAuction) {
                try {
                    $arr = PurchasedBy::load("SELECT * FROM PurchasedBy WHERE pid='".$item->get('pid')."' and unitPrice=(SELECT MAX(unitPrice) FROM PurchasedBy WHERE pid='".$item->get('pid')."');");
                } catch(Exception $e) { }
                $cBid = 0;
                if(empty($arr)) {
                    echo("<div class='row'>
                            <div class='col-md-8'>
                                <span>
                                    Current Bid: <font style='font-weight: bold; font-size:larger;'>$0.00</font>
                                </span><span class='pull-right'>
                                    Buy Out Price: <font style='font-weight: bold; font-size:larger;'>$".$item->get('buy_out').'</font>
                                </span>
                            </div>
                        </div>');
                } else {
                    $cBid = $arr[0]->get('unitPrice');
                    echo("<div class='row'>
                            <div class='col-md-8'>
                                <span>
                                    Current Bid: <font style='font-weight: bold; font-size:larger;'>$". $cBid ."</font>
                                </span><span class='pull-right'>
                                    Buy Out Price: <font style='font-weight: bold; font-size:larger;'>$".$item->get('buy_out').'</font>
                                </span>
                            </div>
                        </div>');
                }
                ?>

                <?php
            }
          ?>
		  <div class="content">
			<?php echo(prettyDescription($item->get('description'))); ?>
		  </div>
          <?php
          if($user != FALSE) {
            ?>
              <div class="row">
                <div class="col-md-8">
                    <form action='product.php?pid=<?php echo($item->get('pid')); ?>' method="POST">
                        <?php
                            if($isAuction)
                                echo("<button type='submit' name='bid' class='btn btn-primary' value='".($cBid+1)."'>Bid $". ($cBid+1) ."</button>");
                        ?>
                        <button type='submit' name="purchase" class='btn btn-primary pull-right'>Buy Now</button>
                    </form>
                </div>
            <?php
          }
          ?>
          </div>
	    </div>
      </div><div class="row">
        <div class="col-md-8 col-md-offset-4">
          <?php
            foreach($item->getRatings() as $r) {
                echo("<br /><div style='background-color:white;' class='row'>
                        <div class='col-xs-3'>
                          " . $r->get('username') . "
                        </div><div class='col-xs-2'>
                          " . $r->get('rating') . "
                        </div><div class='col-xs-7'>
                          " . $r->get('description') . "
                        </div>
                      </div>");
            }
            if($GLOBALS['user'] != FALSE) {
              ?>
              <br />
              <div style='background-color:white;' id='newRating'>
                <form action="product.php?pid=<?php echo($item->get('pid')); ?>" method="POST" onsubmit="return verify();">
                  <div class='row'>
                    <div class='col-xs-6 col-md-2'>
                      <h5>
                        Submitting As:
                      </h5>
                    </div><div class='col-xs-6 col-md-2'>
                      <h5>
                        <?php echo($GLOBALS['user']->get('name')); ?>
                      </h5>
                    </div><div class='col-xs-6 col-md-2 col-md-offset-2'>
                      <h5>
                        Rating
                      </h5>
                    </div><div class='col-xs-6 col-md-4'>
                        <div class="rating">
                            <input type="radio" id="star5" name="rating" value="5" /><label for="star5" title="Rocks!">5 stars</label>
                            <input type="radio" id="star4" name="rating" value="4" /><label for="star4" title="Pretty good">4 stars</label>
                            <input type="radio" id="star3" name="rating" value="3" /><label for="star3" title="Meh">3 stars</label>
                            <input type="radio" id="star2" name="rating" value="2" /><label for="star2" title="Kinda bad">2 stars</label>
                            <input type="radio" id="star1" name="rating" value="1" /><label for="star1" title="Sucks big time">1 star</label>
                        </div>
                    </div>
                  </div><div class='row'>
                    <div class='col-xs-2'>
                      Description
                    </div>
                    <div class='col-xs-8'>
                      <textarea name='rating_description' id='new_rating_description' class="form-control" rows="3"></textarea>
                    </div><div class='col-xs-2'>
                      <button type='submit' name='subReview' class='btn btn-primary'>Submit Review</button>
                    </div>
                  </div>
                </form>
              </div>
              <?php
            }
          ?>
        </div>
      </div>
      <?php
    }
    ?>
    <br /><br />
  </body>
</HTML>
