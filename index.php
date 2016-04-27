<HTML>
  <head>
    <?php include("htmlHeader.php"); ?>
    <title>TheNile Main</title>
    <script type="text/javascript">

    </script>
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
      <div class="col-xs-12">
        <div class="container transBlueBack" style="width:98%;margin-left:auto;margin-right:auto;">
          <div class="row">
            <div class="col-xs-11 col-xs-offset-1">
              <h2><u>
                Featured Products
              </u></h2>
            </div>
          </div>
          <div class="row"><br />
            <?php
            foreach(Product::getRandom(12) as $i => $item) {
              if($i != 0 AND $i % 4 == 0)
                echo('</div><div class="row">');
              echo(productPreview($item));
              $i++;
            }
            ?>
          </div>
          <br />
        </div>
      </div>
    </div>
  </body>
</html>
