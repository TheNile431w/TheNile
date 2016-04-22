<HTML>
  <head>
    <?php include("htmlHeader.php");
    error_reporting(E_ALL);
    ?>

    <title>Profile</title>

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
    $bids = array();
    $cart = array();
    $purchased = array();
    foreach(PurchasedBy::load(array('username'=>$user->get('username'))) as $purchase) {
        $product = new Product(array('pid'=>$purchase->get('pid')), FALSE);
        /*$product = $product->getSubClass();
        if($product == FALSE) {

        } elseif(get_class($product) == "Purchase") {               // PURCHASE ITEM
            if(is_null($product->get("acq_id"))) {                      // In cart
                $cart[] = $product;
            } else {                                                    // Purchased
                $purchased[] = $product;
            }
        } elseif(get_class($product) == "Auction") {                // AUCTION ITEM
            if(strtotime($product->get('endTime')) > time()) {
                if(!is_null($product->get("acq_id")) {                  // Won bidding
                    $purchased[] = $product;
                }
            } else {                                                    // Active bidding
                $bids[] = $product;
            }
        }*/
    }
    ?>
  </body>
</HTML>
