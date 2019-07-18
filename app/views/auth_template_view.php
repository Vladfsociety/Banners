<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <title>Log in</title>
    <link rel="stylesheet" href=<?php echo htmlspecialchars(CSS_BOOTSTRAP_DIRECTORY."bootstrap.css"); ?>>
    <style type="text/css">
      body {
        padding-top: 40px;
        padding-bottom: 40px;
        background-color: #f5f5f5;
      }
      .form-signin {
        max-width: 300px;
        padding: 19px 29px 29px;
        margin: 0 auto 20px;
        background-color: #fff;
        border: 1px solid #e5e5e5;
        -webkit-border-radius: 5px;
           -moz-border-radius: 5px;
                border-radius: 5px;
        -webkit-box-shadow: 0 1px 2px rgba(0,0,0,.05);
           -moz-box-shadow: 0 1px 2px rgba(0,0,0,.05);
                box-shadow: 0 1px 2px rgba(0,0,0,.05);
      }
      .form-signin .form-signin-heading,
      .form-signin .checkbox {
        margin-bottom: 15px;
        text-align: center;
      }
      .form-signin input[type="text"],
      .form-signin input[type="password"] {
        font-size: 16px;
        height: auto;
        margin-bottom: 15px;
        padding: 7px 9px;
      }
       .form-signin input {
        margin-bottom: 10px;
        margin-top: 10px;
      }
      .form-signin button[name="submit"] { 
        position: relative;
        left: 200px;
      }
      .form-signin input[name="Cancel"] { 
        position: relative;
        left: -100px;
      } 
    </style>   
  </head>

  <body>
			<?php include_once VIEWS_DIRECTORY.$content_view; ?>
  </body>
</html>
