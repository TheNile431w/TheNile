<nav class="navbar navbar-default">
  <div class="container-fluid">
    <!-- Brand and toggle get grouped for better mobile display -->
    <div class="navbar-header">
      <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" aria-expanded="false">
        <span class="sr-only">Toggle navigation</span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
      </button>
      <a class="navbar-brand" href="#">The Nile</a>
    </div>

    <!-- Collect the nav links, forms, and other content for toggling -->
    <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
      <ul class="nav navbar-nav">
        <li class="dropdown">
          <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Categories<span class="caret"></span></a>
          <ul class="dropdown-menu">
            <?php

            function traverse($array) {
              $s = "";
              foreach($array as $k => $v) {
                $s .= "<li". (!empty($v) ? " class='dropdown-submenu'" : "") ."><a href='#'>" . $k . "</a>";
                if(!empty($v)) {
                  $s .= "<ul class='dropdown-menu'>" . traverse($v) . "</ul>";
                }
                $s .= "</li>";
              }
              return $s;
            }
            foreach(ParentCategory::getArray("All") as $k => $v) {
              echo(traverse($v));
            }

            ?>
          </ul>
        </li>
      </ul>

      <form class="navbar-form navbar-left" role="search">
        <div class="form-group">
          <input type="text" class="form-control" placeholder="Search">
        </div>
        <button type="submit" class="btn btn-default">Submit</button>
      </form>

      <ul class="nav navbar-nav navbar-right">
        <li class="dropdown">
          <?php
          if($user == FALSE) {
            ?>
            <a class="dropdown-toggle" href="#" data-toggle="dropdown">Sign In <strong class="caret"></strong></a>
            <div class="dropdown-menu" style="padding: 15px; padding-bottom: 0px; width: 350px;">
              <form class="navbar-form navbar-right" method="post" action="<?php echo($_SERVER['PHP_SELF']); ?>" style="margin:0px;padding:0px;">
                <div class="form-group">
                  <label for="inputEmail3" class="col-sm-3 control-label">Email</label>
                  <div class="col-sm-9">
                    <input type="text" class="form-control" id="loginUsername" name="login_username" placeholder="Username">
                  </div>
                  <label for="inputPassword3" class="col-sm-3 control-label">Password</label>
                  <div class="col-sm-9">
                    <input type="password" class="form-control" id="loginPassword" name="login_password" placeholder="Password">
                  </div>
                </div>
                <div class="form-group" style="width:95%;">
                  <div class="col-sm-offset-2 col-sm-10">
                    <a href="signup.php">
                      <button type="button" class="btn btn-default pull-left">Sign Up</button>
                    </a>
                    <button type="submit" class="btn btn-default pull-right">Sign in</button>
                  </div>
                </div>
              </form>
            </div>
            <?php
          } else {
            ?>
            <a class="dropdown-toggle" href="#" data-toggle="dropdown"><?php echo($user->get("name")); ?></a>
            <ul class="dropdown-menu">
              <li><a href="profile.php">Profile</a></li>
              <li><a href="<?php echo($_SERVER['PHP_SELF']); ?>?logout=true">Logout</a></li>
            </ul>
            <?php
          }
          ?>
        </li>
      </ul>


    </div><!-- /.navbar-collapse -->
  </div><!-- /.container-fluid -->
</nav>
