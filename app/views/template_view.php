<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <title>Home</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="stylesheet" href="/assets/css/flexslider/flexslider.css" type="text/css" media="screen" />
    <link href="/assets/css/bootstrap/bootstrap.css" rel="stylesheet">
    <style type="text/css">
      body {
        padding-top: 60px;
        padding-bottom: 60px;
      }

      /* Custom container */
      .container {
        margin: 0 auto;
        max-width: 1000px;
      }
      .container > hr {
        margin: 60px 0;
      }

      /* Main marketing message and sign up button */
      .jumbotron {
        margin: 80px 0;
        text-align: center;
      }
      .jumbotron h1 {
        font-size: 100px;
        line-height: 1;
      }
      .jumbotron .lead {
        font-size: 24px;
        line-height: 1.25;
      }
      .jumbotron .btn {
        font-size: 21px;
        padding: 14px 24px;
      }

      /* Supporting marketing content */
      .marketing {
        margin: 60px 0;
      }
      .marketing p + h4 {
        margin-top: 28px;
      }

      /* Customize the navbar links to be fill the entire space of the .navbar */
      .navbar .navbar-inner {
        padding: 0;
      }
      .navbar .nav {
        margin: 0;
      }
      .navbar .nav li {
        display: table-cell;
        width: 1%;
        float: none;
      }
      .navbar .nav li a {
        font-weight: bold;
        text-align: center;
        border-left: 1px solid rgba(255,255,255,.75);
        border-right: 1px solid rgba(0,0,0,.1);
      }
      .navbar .nav li:first-child a {
        border-left: 0;
        border-radius: 3px 0 0 3px;
      }
      .navbar .nav li:last-child a {
        border-right: 0;
        border-radius: 0 3px 3px 0;
      }
    </style>
    <link href="/assets/css/bootstrap/bootstrap-responsive.css" rel="stylesheet">
    <link rel="shortcut icon" href="../ico/favicon.png">
  </head>

  <body>

    <div class="container">
      <div class="masthead">
        <div class="navbar">
          <div class="navbar-inner">
            <div class="container">
              <ul class="nav">
                <li><a href="/">Home</a></li>
                <li><a href="#">Projects</a></li>
                <li><a href="#">Services</a></li>
                <li><a href="#">Downloads</a></li>
                <li><a href="#">About</a></li>
                <li><a href="#">Contact</a></li>
              </ul>
            </div>
          </div>
        </div><!-- /.navbar -->
      </div>

      <!-- Jumbotron -->
      <div class="jumbotron">
        <h1>Banners</h1>        
        <!--<a class="btn btn-large btn-success" href="#">Get started today</a>-->
      </div>

      <div class="row-fluid">
        <div class="span12">
        	<div id="wrapper">
			<div id="logo">
				<?php		














					$path = '/var/www/dev-vladk/web/assets/images/';

					if ($open = scandir($path)) {
					    foreach ($open as $k => $v) {
					        //if ($v != "." && $v != "..") {
					            echo $v, "<br>";
					        //}
					    }
					}














					if (isset($_SESSION['loggedin']) && $_SESSION['loggedin'])
					{
						echo $_SESSION['user_name'];
						?> <a href="/logout/index">Logout</a> <?php
					} 
					else {
						?> <a href="/login/index">Login</a> <?php
					}
				?>
			</div>
			<div id="content">
				<div class="box">
					<?php include 'app/views/'.$content_view; ?>
				</div>
				<br class="clearfix" />
			</div>
        </div>
      </div>

      <hr>

    </div> 
    <!--
    <script src="/jquery.js"></script>
    <script src="../js/bootstrap-transition.js"></script>
    <script src="../js/bootstrap-alert.js"></script>
    <script src="../js/bootstrap-modal.js"></script>
    <script src="../js/bootstrap-dropdown.js"></script>
    <script src="../js/bootstrap-scrollspy.js"></script>
    <script src="../js/bootstrap-tab.js"></script>
    <script src="../js/bootstrap-tooltip.js"></script>
    <script src="../js/bootstrap-popover.js"></script>
    <script src="../js/bootstrap-button.js"></script>
    <script src="../js/bootstrap-collapse.js"></script>
    <script src="../js/bootstrap-carousel.js"></script>
    <script src="../js/bootstrap-typeahead.js"></script>
	-->
  </body>
</html>
