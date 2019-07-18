<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <title></title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
    <link rel="stylesheet" href=<?php echo htmlspecialchars(CSS_BOOTSTRAP_DIRECTORY."bootstrap.css"); ?>>
    <style type="text/css">
      body {
        padding-top: 40px;
        padding-bottom: 40px;
        background-color: #f5f5f5;
      }
      .form {
        max-width: 350px;
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
      .form-heading {
        text-align: center;
      }
      .form .form-heading,
      .form .checkbox {
        margin-bottom: 15px;
      }
      .form input[type="text"],
       select[name="Status"] { 
        font-size: 16px;
        height: auto;
        margin-bottom: 0px;
        padding: 7px 9px;
      }
      .form .custom-file {
        margin-bottom: 30px;
      }
      .form label[id="1"] {  
       margin-top: 20px;
       margin-bottom: 0px;  
       margin-left: 5px;
       font-size: 20px;
      }      
      .form button[name="submit"] { 
        position: relative;
        left: 200px;
      }
      .form input[name="Cancel"] { 
        position: relative;
        left: -100px;
      }     
    </style>
  </head>

  <body>
  			<?php include_once VIEWS_DIRECTORY.$content_view; ?> 
        <script>
        $(".custom-file-input").on("change", function() {
          var fileName = $(this).val().split("\\").pop();
          $(this).siblings(".custom-file-label").addClass("selected").html(fileName);
        });
        </script>         
  </body>
</html>
