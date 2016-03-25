<HTML>
  <head>
    <?php include("htmlHeader.php"); ?>

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
						<span class="star-rating">
						  <input type="radio" name="rating" value="1"><i></i>
						  <input type="radio" name="rating" value="2"><i></i>
						  <input type="radio" name="rating" value="3"><i></i>
						  <input type="radio" name="rating" value="4"><i></i>
						  <input type="radio" name="rating" value="5"><i></i>
						</span>
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
