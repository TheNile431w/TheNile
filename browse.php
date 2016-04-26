<HTML>
  <head>
    <?php include("htmlHeader.php"); ?>
    <title>TheNile Browse Products</title>
	<?php
		$category = "All";
		if(isset($_GET['category'])) {
			$category = $_GET['category'];
		}

		function loadFromCategory($array) {
			$ret = array();
			foreach($array as $k => $v) {
				$db = new database();
				$r = $db->query("SELECT DISTINCT pid FROM PartOf WHERE category = '$k';");
				for($i=0; $i<$r->num_rows; $i++) {
					$tmp = $r->fetch_assoc();
					$ret[] = new Product($tmp);
				}
				if(is_array($v)) {
					foreach(loadFromCategory($v) as $vv) {
						$ret[] = $vv;
					}
				}
			}
			return $ret;
          /*$s = array();
          foreach($array as $k => $v) {
            $s = array_merge($s, Product::load("SELECT DISTINCT pid FROM PartOf WHERE category = '$k';"));
            if(!empty($v)) {
              $s = array_merge($s, loadFromCategory($v));
            }
          }
          return $s;*/
        }
        $prods = loadFromCategory(ParentCategory::getArray($category));

        if(isset($_GET['search'])) {
        	foreach($prods as $i => $p) {
        		if(		(strpos(strtolower($p->get('pname')), strtolower($_GET['search'])) == FALSE)
        			AND	(strpos(strtolower($p->get('sold_by')), strtolower($_GET['search'])) == FALSE)
        			AND	(strpos(strtolower($p->get('pid')), strtolower($_GET['search'])) == FALSE)
        			AND	(strpos(strtolower($p->get('description')), strtolower($_GET['search'])) == FALSE)
        		) {
        			unset($prods[$i]);
        		}
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
    <div class="row">
      <div class="col-md-3 col-lg-2">
      	<ol class="breadcrumb">
			<?php
			$i = 0;
			foreach(ParentCategory::getAncestors($category) as $c) {
				$i++;
				echo('<div style="margin-left:10px;"><li style="display:block;"><a href="browse.php?category='.$c.'">'.$c.'</a></li>');
			} for($j=0;$j<$i;$j++) {
				echo('</div>');
			}
			?>
		</ol>
      </div>
      <div class="col-md-9 col-lg-10">
      	<div class="row">
			<?php
			foreach($prods as $i => $p) {
				if(($i++ != 0) AND ($i % 4 == 1))
					echo("</div><div class='row'>");
				echo(productPreview($p));
			}
			?>
		</div>
      </div>
	</div>
  </body>
</HTML>

