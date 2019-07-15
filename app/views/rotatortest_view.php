
<html class="no-js" lang="en">
<head>
  <meta content="charset=utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0">

  <link rel="stylesheet" href="assets/css/flexslider.css" type="text/css" media="screen" />
  <!-- Modernizr -->
  <script src="assets/js/modernizr.js"></script>

</head>
<body class="loading">
  <div id="main" role="main">
      <section class="slider">
        <div class="flexslider">
          <ul class="slides">
            <li>
              <img src="assets/images/kitchen_adventurer_cheesecake_brownie.jpg" />
              <p class="flex-caption">Adventurer Cheesecake Brownie</p>
             
            </li>
            <li>
              <img src="assets/images/kitchen_adventurer_lemon.jpg" />
              <p class="flex-caption">Adventurer Lemon</p>
            </li>
            <li>
              <img src="assets/images/kitchen_adventurer_donut.jpg" />
              <p class="flex-caption">Adventurer Donut</p>
            </li>
            <li>
              <img src="assets/images/kitchen_adventurer_caramel.jpg" />
              <p class="flex-caption">Adventurer Caramel</p>
            </li>
          </ul>
        </div>
      </section>      
    </div>
  </div>
  <!-- jQuery -->
  <script src="http://ajax.googleapis.com/ajax/libs/jquery/1/jquery.min.js"></script>
  <script>window.jQuery || document.write('<script src="js/libs/jquery-1.7.min.js">\x3C/script>')</script>

  <!-- FlexSlider -->
  <script defer src="assets/js/jquery.flexslider.js"></script>

  <script type="text/javascript">
    $(function(){
      SyntaxHighlighter.all();
    });
    $(window).load(function(){
      $('.flexslider').flexslider({
        animation: "slide",
        start: function(slider){
          $('body').removeClass('loading');
        }
      });
    });
  </script>

  <!-- Syntax Highlighter -->
  <script type="text/javascript" src="assets/js/shCore.js"></script>
  <script type="text/javascript" src="assets/js/shBrushXml.js"></script>
  <script type="text/javascript" src="assets/js/shBrushJScript.js"></script>

  <!-- Optional FlexSlider Additions -->
  <script src="assets/js/jquery.easing.js"></script>
  <script src="assets/js/jquery.mousewheel.js"></script>
  <script defer src="assets/js/demo.js"></script>

</body>
</html>