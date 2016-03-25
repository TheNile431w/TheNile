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
        <h4>
          <i>
            Where the deals flow to you!
          </i>
        </h4>
      </div>
    </div>
    <hr style="width:90%;" />
    <div class="row">
      <div class="col-md-3 col-lg-2">
        <h2>
          Featured Products
        </h2>
      </div>
      <div class="col-md-9 col-lg-10">
        <div class="container" style="width:100%;">
          <?php
          foreach(Purchase::getRandom(12) as $i => $item) {
            if($i != 0 AND $i % 4 == 0)
              echo('</div><div class="row">');
            echo(productPreview($item));
            $i++;
          }
          ?>
        </div>
      </div>
    </div>
  </body>
</html>



