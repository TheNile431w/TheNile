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
    if(isset($_POST['newPhone']) AND !empty($_POST['pnum']) AND strlen(preg_replace("/[^0-9]/","",$_POST['pnum'])) == 10 AND !empty($_POST['description']) AND $user != FALSE) {
        new Phone(array('pnum'=>preg_replace("/[^0-9]/","",$_POST['pnum']),
                        'username'=>$user->get('username'),
                        'description'=>$_POST['description'],
                        'defaultPhone'=>(isset($_POST['defaultPhone']) ? '1' : '0')));
    } if(isset($_POST['newAddr']) AND !empty($_POST['description']) AND strlen(preg_replace("/[^0-9]/","",$_POST['zip'])) == 5 AND !empty($_POST['street'])) {
        try {
            $l = new Located(array('zip'=>preg_replace("/[^0-9]/","",$_POST['zip'])), FALSE);
            $s = new Address(array( 'username'=>$user->get('username'),
                                    'description'=>$_POST['description'],
                                    'defaultAddr'=>(isset($_POST['defaultAddr']) ? '1' : '0'),
                                    'zip'=>preg_replace("/[^0-9]/","",$_POST['zip']),
                                    'street'=>$_POST['street']));
        } catch(Exception $e) {
            if(!empty($_POST['city']) AND !empty($_POST['state'])) {
                $l = new Located(array('zip'=>preg_replace("/[^0-9]/","",$_POST['zip']), 'city'=>$_POST['city'], 'state'=>$_POST['state']));
                $s = new Address(array( 'username'=>$user->get('username'),
                                        'description'=>$_POST['description'],
                                        'defaultAddr'=>(isset($_POST['defaultAddr']) ? '1' : '0'),
                                        'zip'=>preg_replace("/[^0-9]/","",$_POST['zip']),
                                        'street'=>$_POST['street']));
            }
        }
    } if(isset($_POST['newCard']) AND !empty($_POST['description']) AND !empty($_POST['cardName']) AND strlen(preg_replace("/[^0-9]/","",$_POST['cardNum'])) == 16 AND strtotime($_POST['expDate']) != FALSE AND !empty($_POST['type'])) {
        new Creditcard(array(   'username'=>$user->get('username'),
                                'cardNum'=>preg_replace("/[^0-9]/","",$_POST['cardNum']),
                                'description'=>$_POST['description'],
                                'defaultCard'=>(isset($_POST['defaultCard']) ? '1' : '0'),
                                'cardName'=>$_POST['cardName'],
                                'expDate'=>date('Y-m-d', strtotime($_POST['expDate'])),
                                'cardType'=>$_POST['type']));
    } if(isset($_POST['rmCart']) AND $user != FALSE) {
        $cartItem = new Product(array('pid'=>$_POST['rmCart']));
        (new database())->query("DELETE FROM PurchasedBy WHERE username='".$user->get('username')."' AND pid='".$cartItem->get('pid')."' AND acq_id IS NULL;");
    }


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
                $purchased[] = $product;
            }
        } elseif(get_class($product) == "Auction") {                // AUCTION ITEM
            $arr = PurchasedBy::load("SELECT * FROM PurchasedBy WHERE pid='".$product->get('pid')."' and unitPrice=(SELECT MAX(unitPrice) FROM PurchasedBy WHERE pid='".$product->get('pid')."');");
            if(strtotime($product->get('endTime')) < time()) {
                if($purchase->get("acq_id") !== FALSE) {                // Won bidding
                    $purchased[] = $product;
                } elseif($arr[0]->get('username') == $user->get('username')) {
                    $cart[] = $product;
                }
            } else {                                                    // Active bidding
                $top = false;
                foreach($arr as $ar) {
                    if($ar->get('username') == $user->get('username'))
                        $top = true;
                }
                if($top AND $arr[0]->get('unitPrice') >= $product->get('buy_out')) {
                    $cart[] = $product;
                } else {
                    $bids[] = $product;
                }
            }
        }
    }

    if(isset($_POST['purchaseCart']) AND strtolower($_POST['purchaseCart']) == 'true' AND isset($_POST['addrChoice']) AND isset($_POST['cardChoice'])) {
        $card = new Creditcard(array('cardNum'=>$_POST['cardChoice']), FALSE);
        $addr = new Address(array('addr_id'=>$_POST['addrChoice']), FALSE);
        $newestAcq = (new database())->query("SELECT MAX(acq_id) AS acq_id FROM Acquired;");
        $newestAcq = $newestAcq->fetch_assoc();
        $newestAcq = $newestAcq['acq_id']+1;
        $a = new Acquired(array('acq_id'=>$newestAcq, 'card_id'=>$card->get('cardNum'), 'addr_id'=>$addr->get('addr_id')));
        foreach($cart as $item) {
            $arr = PurchasedBy::load("SELECT * FROM PurchasedBy WHERE pid='".$item->get('pid')."' AND username='".$user->get('username')."' AND unitPrice=(SELECT MAX(unitPrice) FROM PurchasedBy WHERE pid='".$item->get('pid')."');");
            (new database())->query("UPDATE PurchasedBy SET acq_id=".$a->get('acq_id')." WHERE pid=".$item->get('pid')." AND username='".$user->get('username')."' AND time='".$arr[0]->get('time')."';");
        }
        $cart = array();
    }
    ?>
    <div class="container transBlueBack" style="width:95%;">
        <div style="width:95%;margin-left:auto;margin-right:auto;">
            <div class="row">
                <div class="col-md-5">
                    <h3>Phones</h3>
                    <table class="table table-striped" style="background-color:#CCCCCC;width:99%;border-radius:3px;">
                        <thead>
                            <tr>
                                <th>
                                    Default
                                </th><th>
                                    Phone Number
                                </th><th>
                                    Description
                                </th><th>
                                    Action
                                </th>
                            </tr>
                        </thead><tbody>
                            <?php
                            foreach(Phone::load(array('username' => $user->get('username'))) as $ph) {
                                echo("<tr>
                                        <td>
                                            <input type='radio' name='phoneRad' value='". $ph->get("pnum") . "'" . ($ph->get('defaultPhone') == 1 ? " checked='checked" : "") . ">
                                        </td><td>
                                            ". $ph->get('pnum') ."
                                        </td><td>
                                            ". $ph->get('description') ."
                                        </td><td>
                                            <button class='glyphicon glyphicon-remove' onclick='window.location=\"profile.php?rmPhone=".$ph->get('pnum')."\"'>
                                        </td>
                                    </tr>");
                            }
                            ?>
                            <form action="profile.php" method="POST" onsubmit="return verifyNewPhone();">
                                <tr>
                                    <td>
                                        <input type='radio' name='phoneRad' value='new' />
                                    </td><td>
                                        <input type="textbox" class="form-control" name="pnum" placeholder="XXX-XX-XXXX" />
                                    </td><td>
                                        <textarea class="form-control" name="description" rows=3></textarea>
                                    </td><td>
                                        <button type="submit" class="glyphicon glyphicon-ok" name='newPhone'></button>
                                    </td>
                                </tr>
                            </form>
                        </tbody>
                    </table>
                </div><div class="col-md-7">
                    <h3>Addresses</h3>
                    <table class="table table-striped" style="background-color:#CCCCCC;width:99%;border-radius:3px;">
                        <thead>
                            <tr>
                                <th>
                                    Default
                                </th><th>
                                    Description
                                </th><th>
                                    Zip-Code
                                </th><th>
                                    City
                                </th><th>
                                    State
                                </th><th>
                                    Street
                                </th><th>
                                    Action
                                </th>
                            </tr>
                        </thead><tbody>
                            <?php
                            foreach(Address::load(array('username' => $user->get('username'))) as $ph) {
                                $l = new Located(array('zip'=>$ph->get('zip')));
                                echo("<tr>
                                        <td>
                                            <input type='radio' name='addrRad' value='". $ph->get("addr_id") . "'" . ($ph->get('defaultAddr') == 1 ? " checked='checked" : "") . ">
                                        </td><td>
                                            ". $ph->get('description') ."
                                        </td><td>
                                            ". $ph->get('zip') ."
                                        </td><td>
                                            ". $l->get('city') ."
                                        </td><td>
                                            ". $l->get('state') ."
                                        </td><td>
                                            ". $ph->get('street') ."
                                        </td><td>
                                            <button class='glyphicon glyphicon-remove' onclick='window.location=\"profile.php?rmAddr=".$ph->get('addr_id')."\"'></button>
                                        </td>
                                    </tr>");
                            }
                            ?>
                            <form action="profile.php" method="POST" onsubmit="return verifyNewAddr();">
                                <tr>
                                    <td>
                                        <input type='radio' name='addrRad' value='new' />
                                    </td><td>
                                        <textarea class="form-control" name="description" rows=3></textarea>
                                    </td><td>
                                        <input type="textbox" class="form-control" name="zip" placeholder="XXXXX" />
                                    </td><td>
                                        <input type="textbox" class="form-control" name="city" placeholder="Pittsburgh">
                                    </td><td>
                                        <input type="textbox" class="form-control" name="state" placeholder="Pennsylvania">
                                    </td><td>
                                        <input type="textbox" class="form-control" name="street" placeholder="123 Home Street" />
                                    </td><td>
                                        <button type="submit" class="glyphicon glyphicon-ok" name='newAddr'></button>
                                    </td>
                                </tr>
                            </form>
                        </tbody>
                    </table>
                </div>
            </div><div class="row">
                <div class="col-md-10 col-md-offset-1">
                    <h3>Credit Cards</h3>
                    <table class="table table-striped" style="background-color:#CCCCCC;width:99%;border-radius:3px;">
                        <thead>
                            <tr>
                                <th>
                                    Default
                                </th><th>
                                    Description
                                </th><th>
                                    Card Name
                                </th><th>
                                    Card Num
                                </th><th>
                                    Expiration Date
                                </th><th>
                                    Card Type
                                </th><th>
                                    Action
                                </th>
                            </tr>
                        </thead><tbody>
                            <?php
                            foreach(Creditcard::load(array('username' => $user->get('username'))) as $ph) {
                                echo("<tr>
                                        <td>
                                            <input type='radio' name='addrRad' value='". $ph->get("addr_id") . "'" . ($ph->get('defaultAddr') == 1 ? " checked='checked" : "") . ">
                                        </td><td>
                                            ". $ph->get('description') ."
                                        </td><td>
                                            ". $ph->get('cardName') ."
                                        </td><td>
                                            ". $ph->get('cardNum') ."
                                        </td><td>
                                            ". $ph->get('expDate') ."
                                        </td><td>
                                            ". $ph->get('cardType') ."
                                        </td><td>
                                            <button class='glyphicon glyphicon-remove' onclick='window.location=\"profile.php?rmCard=".$ph->get('addr_id')."\"'></button>
                                        </td>
                                    </tr>");
                            }
                            ?>
                            <form action="profile.php" method="POST" onsubmit="return verifyNewCard();">
                                <tr>
                                    <td>
                                        <input type='radio' name='addrRad' value='new' />
                                    </td><td>
                                        <textarea class="form-control" name="description" rows=3></textarea>
                                    </td><td>
                                        <input type="textbox" class="form-control" name="cardName" placeholder="My Visa Card" />
                                    </td><td>
                                        <input type="textbox" class="form-control" name="cardNum" placeholder="XXXX-XXXX-XXXX-XXXX">
                                    </td><td>
                                        <input type="textbox" class="form-control dateF" name="expDate" placeholder="1/1/2018">
                                    </td><td>
                                        <input type="textbox" class="form-control" name="type" placeholder="Visa">
                                    </td><td>
                                        <button type="submit" class="glyphicon glyphicon-ok" name='newCard'>
                                    </td>
                                </tr>
                            </form>
                        </tbody>
                    </table>
                </div>
            </div>
            <div class="row">
                <h3 style="color:white;">Bids</h3>
                <table class="table table-striped" style="background-color:#CCCCCC;width:99%;border-radius:3px;">
                    <thead>
                        <tr>
                            <th>
                                Item
                            </th><th>
                                Status
                            </th><th>
                                End Time
                            </th><th>
                                Bid
                            </th><th>
                                Buy Out
                            </th>
                        </tr>
                    </thead><tbody>
                        <?php
                        foreach($bids as $i) {
                            $item = new Product(array("pid" => $i->get('pid')), FALSE);
                            $item = $item->getSubClass();
                            $arr = PurchasedBy::load(array("pid"=>$i->get('pid'), "username"=>$uname));
    
                            $cBid = $arr[count($arr)-1]->get('unitPrice');
                            echo("<form action='product.php?pid=".$item->get('pid')."' method='POST'>
                                <tr>
                                    <td>
                                        <a href='product.php?pid=".$item->get('pid')."'>
                                            ". $item->get('pname') ."
                                        </a>
                                    </td><td>
                                        ". (($arr[0]->get('username') == $uname) ?
                                            "You hold the top bid of $".sprintf("%.2f",$cBid)."!"
                                            :
                                            "The current bid is $".sprintf("%.2f",$cBid))
                                        ."
                                    </td><td>
                                        Auction ends on " . date('M jS, Y \a\t g:i:sa', strtotime($item->get('endTime'))) . "
                                    </td><td>
                                        ". (($arr[0]->get('username') == $uname) ?
                                            "<button name='bid' class='btn btn-primary' disabled='true' value='".($cBid+1)."'>Bid $". ($cBid+1) ."</button>"
                                            :
                                            "<button type='submit' name='bid' class='btn btn-primary' value='".($cBid+1)."'>Bid $". ($cBid+1) ."</button>")
                                        ."
                                    </td><td>
                                        <button type='submit' name='purchase' class='btn btn-primary'>Buy Now</button>
                                    </td>
                                </tr></form>");
                        }
                        ?>
                    </tbody>
                </table>
            </div>
            
            <br /><br />

            <div class="row">
                <h3 style="color:white;">Cart</h3>
                <table class="table table-striped" style="background-color:#CCCCCC;width:99%;border-radius:3px;">
                    <thead>
                        <tr>
                            <th>
                                Item
                            </th><th>
                                Price
                            </th><th>
                                Quantity
                            </th><th>
                                Remove
                            </th>
                        </tr>
                    </thead><tbody>
                        <?php
                        $total = 0;
                        foreach($cart as $i) {
                            $record = PurchasedBy::load(array("pid"=>$i->get('pid'), "username"=>$uname))[0];
                            $arr = PurchasedBy::load(array("pid"=>$i->get('pid'), "username"=>$uname));
    
                            $cBid = $arr[count($arr)-1]->get('unitPrice');
                            $total += $cBid;
                            echo("<tr>
                                    <td>
                                        <a href='product.php?pid=".$i->get('pid')."'>". $i->get('pname') ."</a>
                                    </td><td>
                                        ". $cBid ."
                                    </td><td>
                                        ". $record->get('qty') ."
                                    </td><td>
                                        <form action='profile.php' method='POST'>
                                            <button class='glyphicon glyphicon-remove' name='rmCart' value='".$i->get('pid')."'>
                                        </form>
                                    </td>
                                </tr>");
                        }
                        ?>
                        <tr>
                            <th>
                                Sub-Total: <?php echo(sprintf("$%.2f",$total)); ?>
                                <br />
                                Tax: <?php echo(sprintf("$%.2f", $total*.07)); ?>
                                <br />
                                Total: <?php echo(sprintf("$%.2f", $total*1.07)); ?>
                            </th><th colspan=3>
                                <form action="profile.php" method="POST">
                                    <button type="submit" name="checkout" value="true" class="btn btn-primary pull-right">Checkout</button>
                                </form>
                            </th>
                        </tr>
                    </tbody>
                </table>
                <?php
                // if(count($cart) > 4)
                //     echo(prodRow($cart));
                // else {
                    // foreach($cart as $i)
                    //     echo(productPreview($i, "$".sprintf("%.2f",$i->get('buy_out'))));
                //}
                ?>
            </div>

            <br /><br />

            <div class="row">
                <h3 style="color:white;">History</h3>
                <table class="table table-striped" style="background-color:#CCCCCC;width:99%;border-radius:3px;">
                    <thead>
                        <tr>
                            <th>
                                Purchase Date
                            </th><th>
                                Ship To:
                            </th><th>
                                Credit Card:
                            </th><th>
                                Item
                            </th><th>
                                Price
                            </th>
                        </tr>
                    </thead>
                        <?php
                        $array = array();
                        foreach(PurchasedBy::load("SELECT * FROM PurchasedBy WHERE username='".$user->get('username')."' AND acq_id IS NOT NULL") as $p) {
                            if(isset($array[$p->get('acq_id')]))
                                $array[$p->get('acq_id')][] = $p;
                            else
                                $array[$p->get('acq_id')]= array($p);
                        }
                        foreach($array as $a) {
                            $acq = new Acquired(array('acq_id'=>$a[0]->get('acq_id')), FALSE);
                            $addr = new Address(array('addr_id'=>$acq->get('addr_id')),FALSE);
                            $card = new Creditcard(array('cardNum'=>$acq->get('card_id')),FALSE);
                            echo("<tr>
                                    <td rowspan=".count($a).">
                                        ".date("d/m/Y, h:i:s", strtotime($a[0]->get('time')))."
                                    </td><td rowspan=".count($a).">
                                        ".$addr->get('description')."
                                    </td><td rowspan=".count($a).">
                                        ".$card->get('cardName')."
                                    </td>");
                            foreach($a as $i=>$v) {
                                $p = new Product(array('pid'=>$v->get('pid')), FALSE);
                                if($i!=0)
                                    echo("<tr>");
                                echo("<td><a href='product.php?pid=".$p->get('pid')."'>".$p->get('pname')."</a></td>");
                                echo("<td>".$v->get('unitPrice')."</td>");
                                echo("</tr>");
                            }
                        }
                        ?>
                </table>
            </div>

            <br /><br />

            <div class="row">
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
    </div>
    <?php
    if(isset($_POST['checkout']) AND strtolower($_POST['checkout']) == 'true') {
        ?>
        <form action="profile.php" method="POST">
            <div class="modal fade" id="checkoutModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
              <div class="modal-dialog modal-lg" role="document">
                <div class="modal-content">
                  <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                    <h4 class="modal-title" id="myModalLabel">Checkout</h4>
                  </div>
                  <div class="modal-body">
                    <div class="row">
                        <div class="col-xs-6">
                            <h3>Items</h3>
                            <table class="table table-striped" style="background-color:#CCCCCC;width:99%;border-radius:3px;">
                                <thead>
                                    <tr>
                                        <th>
                                            Item
                                        </th><th>
                                            Price
                                        </th><th>
                                            Quantity
                                        </th>
                                    </tr>
                                </thead><tbody>
                                    <?php
                                    $total = 0;
                                    foreach($cart as $i) {
                                        $record = PurchasedBy::load(array("pid"=>$i->get('pid'), "username"=>$uname))[0];
                                        $total += $record->get('unitPrice') * $record->get('qty');
                                        echo("<tr>
                                                <td>
                                                    ". $i->get('pname') ."
                                                </td><td>
                                                    ". $i->get('buy_out') ."
                                                </td><td>
                                                    ". $record->get('qty') ."
                                                </td>
                                            </tr>");
                                    }
                                    ?>
                                    <tr>
                                        <th colspan="4">
                                            Sub-Total: <?php echo(sprintf("$%.2f",$total)); ?>
                                            <br />
                                            Tax: <?php echo(sprintf("$%.2f", $total*.07)); ?>
                                            <br />
                                            Total: <?php echo(sprintf("$%.2f", $total*1.07)); ?>
                                        </th>
                                    </tr>
                                </tbody>
                            </table>
                        </div><div class='col-xs-6'>
                            <h3>Ship to:</h3>
                            <table class="table table-striped" style="background-color:#CCCCCC;width:99%;border-radius:3px;">
                                <thead>
                                    <tr>
                                        <td></td><td>
                                            Address
                                        </td><td>
                                            Street
                                        </td><td>
                                            Zip
                                        </td>
                                    </tr>
                                </thead><tbody>
                                    <?php
                                    foreach(Address::load(array('username' => $user->get('username'))) as $ph) {
                                        echo("<tr>
                                                <td>
                                                    <input type='radio' name='addrChoice' value='".$ph->get('addr_id')."'" . ($ph->get('defaultAddr') == 1 ? " checked='checked" : "") . ">
                                                </td><td>
                                                    ".$ph->get('description')."
                                                </td><td>
                                                    ".$ph->get('street')."
                                                </td><td>
                                                    ".$ph->get('zip')."
                                                </td>
                                            </tr>");
                                    }
                                    ?>
                                </tbody>
                            </table>
                            <br /><br />
                            <h3>Credit Card:</h3>
                            <table class="table table-striped" style="background-color:#CCCCCC;width:99%;border-radius:3px;">
                                <thead>
                                    <tr>
                                        <th></th><th>
                                            Card Name
                                        </th><th>
                                            Card Type
                                        </th><th>
                                            Card Number
                                        </th>
                                    </tr>
                                </thead><tbody>
                                    <?php
                                    foreach(Creditcard::load(array('username' => $user->get('username'))) as $ph) {
                                        echo("<tr>
                                                <td>
                                                    <input type='radio' name='cardChoice' value='". $ph->get("cardNum") . "'" . ($ph->get('defaultCard') == 1 ? " checked='checked" : "") . ">
                                                </td><td>
                                                    ". $ph->get('cardName') ."
                                                </td><td>
                                                    ". $ph->get('cardType') ."
                                                </td><td>
                                                    ". $ph->get('cardNum') ."
                                                </td>
                                            </tr>");
                                    }
                                    ?>
                                </tbody>
                            </table>
                        </div>
                    </div>
                  </div>
                  <div class="modal-footer">
                    <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                    <button type="submit" name="purchaseCart" value="true" class="btn btn-primary">Checkout</button>
                  </div>
                </div>
              </div>
            </div>
        </form>
        <script type='text/javascript'>
        $(document).ready(function() {
            $('#checkoutModal').modal();
        });
        </script>
        <?php
    }
    ?>
  </body>
</HTML>





