<HTML>
  <head>
    <?php include("htmlHeader.php"); ?>
    <title>TheNile Main</title>
  </head>

  <body>
    <?php include("htmlTopbar.php"); ?>
    <div class="jumbotron">
      <div style="margin:20px;">
        <h1>
          Welcome to The Nile!
        </h1>
        <h5>
          Where the deals flow to you!
        </h5>
      </div>
    </div>
    <hr style="width:90%;" />
    <div class="row">
      <?php
      foreach(Purchase::getRandom(9) as $item) {
        echo('<div class="col-xs-6 col-md-3">
                <div class="thumbnail">
                  <a href="product.php?pid='.$item->getID().'">
                    <img src="'. IMAGE_FOLDER . urlencode($item->get("img")) .'">
                  </a>
                  <div class="caption">
                    <h3>'.$item->get("name").'</h3>
                    <p>'.$item->get("description").'</p>
                  </div>
                </div>
              </div>');
      }
      ?>
    </div>
  </body>
</html>



