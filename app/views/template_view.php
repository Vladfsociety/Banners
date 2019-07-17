<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <title></title>
    <link href=<?php echo CSS_FLEXSLIDER_DIRECTORY."flexslider.css"; ?> rel="stylesheet">
    <link href=<?php echo CSS_BOOTSTRAP_DIRECTORY."bootstrap.css"; ?> rel="stylesheet">
    <style type="text/css">
      body {
        padding-top: 20px;
        padding-bottom: 40px;
      }
      .container-narrow {
        margin: 0 auto;
        max-width: 1000px;
      } 
    </style>    
  </head>

  <body>
    <div class="container-narrow">
        <ul class="nav nav-pills pull-right">
          <li ><a href="/">Home</a></li>
          <?php 
              if (isset($_SESSION['loggedin']) && $_SESSION['loggedin'])
              {
                echo "<li>".$_SESSION['user_name']."</li> <li><a href=\"/logout/index\">Log out </a> </li>"; 
              } 
              else {
                ?> <li><a href="/login/index">Log in</a> </li><?php
              }
            ?>
        </ul> 
      <div class="row-fluid">
        <div class="span12">
            <?php include VIEWS_DIRECTORY.$content_view; ?>
      </div>
    </div>
  </body>
</html>