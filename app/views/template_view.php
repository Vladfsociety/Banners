<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <title></title>
    <link rel="stylesheet" href=<?php echo htmlspecialchars(CSS_FLEXSLIDER_DIRECTORY."flexslider.css"); ?>>
    <link rel="stylesheet" href=<?php echo htmlspecialchars(CSS_BOOTSTRAP_DIRECTORY."bootstrap.css"); ?>>
    <style type="text/css">
      body {
        padding-top: 20px;
        padding-bottom: 40px;
      }
      .container-narrow {
        margin: 0 auto;
        max-width: 1000px;
      } 
      a.disabled {
        pointer-events: none; /* делаем элемент неактивным для взаимодействия */
        cursor: default; /*  курсор в виде стрелки */
        color: #888;/* цвет текста серый */
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
                ?>
                <li><a class="disable"><?php echo htmlspecialchars($_SESSION['user_name']); ?></a></li> 
                <li><a href="/logout/index">Log out </a> </li>
                <?php
              } 
              else {
                ?> 
                <li><a href="/login/index">Log in</a> </li>
                <?php
              }
            ?>
        </ul> 
      <div class="row-fluid">
        <div class="span12">
            <?php include_once VIEWS_DIRECTORY.$content_view; ?>
        </div>
      </div>
    </div>  
  </body>
</html>