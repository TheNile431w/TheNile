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
    $uname = $user->get('username');
    $selling = Product::load(array("sold_by" => $uname));
    // $products = Product::load("SELECT DISTINCT pid FROM PurchasedBy WHERE username = '$uname'");
    $purchases = PurchasedBy::load("SELECT * FROM PurchasedBy AS pb WHERE unitPrice=(SELECT MAX( unitPrice ) FROM PurchasedBy AS pb2 WHERE pb.pid=pb2.pid AND pb.username=pb2.username AND pb.username='$uname')");
    foreach($purchases as $purchase) {
        $product = new Product(array('pid'=>$purchase->get('pid')), FALSE);
        $product = $product->getSubClass();
        if($product === FALSE) {

        } elseif(get_class($product) == "Purchase") {               // PURCHASE ITEM
            if($purchase->get("acq_id") === FALSE) {                    // In cart
                $cart[] = $product;
            } else {                                                    // Purchased
            }
        } elseif(get_class($product) == "Auction") {                // AUCTION ITEM
            if(strtotime($product->get('endTime')) > time()) {
                if($purhcase->get("acq_id") !== FALSE) {                // Won bidding
                    $purchased[] = $product;
                }
            } else {                                                    // Active bidding
                $bids[] = $product;
            }
        }
    }
    ?>
    <div class="container">
        <div class="row transBlueBack">
            <h3 style="color:white;">Bids</h3>
            <?php
            if(count($bids) > 4)
                echo(prodRow($bids));
            else {
                foreach($bids as $i)
                    echo(productPreview($i));
            }
            ?>
        </div>
        
        <br /><br />

        <div class="row transBlueBack">
            <h3 style="color:white;">Cart</h3>
            <?php
            if(count($cart) > 4)
                echo(prodRow($cart));
            else {
                foreach($cart as $i)
                    echo(productPreview($i));
            }
            ?>
        </div>

        <br /><br />

        <div class="row transBlueBack">
            <h3 style="color:white;">History</h3>
            <?php
            if(count($purchased) > 4)
                echo(prodRow($purchased));
            else {
                foreach($purchased as $i)
                    echo(productPreview($i));
            }
            ?>
        </div>

        <br /><br />

        <div class="row transBlueBack">
            <h3 style="color:white;">Selling</h3>
            <?php
            if(count($selling) > 4)
                echo(prodRow($selling));
            else {
                foreach($selling as $i)
                    echo(productPreview($i));
            }
            ?>
        </div>
    
        <br /><br />
    </div>
  </body>
</HTML>




