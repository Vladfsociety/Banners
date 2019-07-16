<!DOCTYPE html>
<html class="no-js" lang="en">
<head>
  <meta content="charset=utf-8">
  <!--<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0">-->

  <link rel="stylesheet" href="assets/css/flexslider/flexslider.css" type="text/css" media="screen" />
  <!-- Modernizr 
  <script src="assets/js/modernizr.js"></script>-->

</head>
<body class="loading">
	<?php
	if (isset($_SESSION['loggedin']) && $_SESSION['loggedin']) 
{
	echo "<form action=\"/createbanner/index\">
    <button type=\"submit\">Add banner</button>
	</form>
	<br><br>";
}
?>
  <div id="main" role="main">
      <section class="slider">
        <div class="flexslider">
          <ul class="slides">
            
            	<?php 
            	foreach($data as $key => $row) {
            		echo "<li>";
					echo $row['name']."<br>".$row['status']."<br>".$row['position']."<br>".$row['URL']."<br>"; 

					if (isset($_SESSION['loggedin']) && $_SESSION['loggedin']) 
					{
						if (($key - 1) >= 0) {

							echo "<form method=\"POST\" action=\"/changeposition/index\">
							<input type=\"hidden\" name=\"id\" value=".$row['id']." />
							<input type=\"hidden\" name=\"change_id\" value=".$data[$key-1]['id']." />
						    <button type=\"submit\">Move up</button>
							</form>";

							echo "<br>";
						} 		

						if (($key + 1) < count($data)) {

							echo "<form method=\"POST\" action=\"/changeposition/index\">
							<input type=\"hidden\" name=\"id\" value=".$row['id']." />
							<input type=\"hidden\" name=\"change_id\" value=".$data[$key+1]['id']." />
						    <button type=\"submit\">Move down</button>
							</form>";

							echo "<br>";
						}
					}

					echo "<img src = ".$row['URL']."> <br>";		

					if (isset($_SESSION['loggedin']) && $_SESSION['loggedin']) 
					{
						echo "<form method=\"POST\" action=\"/deletebanner/index\">
						<input type=\"hidden\" name=\"id\" value=".$row['id']." />
					    <button type=\"submit\">Remove banner</button>
						</form>";		
					
						echo "<br>";		

						echo "<form method=\"GET\" action=\"/editbanner/index\">
						<input type=\"hidden\" name=\"id\" value=".$row['id']." />
					    <button type=\"submit\">Edit banner</button>
						</form>";
					}

					echo "<br><br>";
					echo "</li>";				
				}
				?> 
          </ul>
        </div>
      </section>      
    </div>
  </div>
  <!-- jQuery -->
  <script src="http://ajax.googleapis.com/ajax/libs/jquery/1/jquery.min.js"></script>
  <script>window.jQuery || document.write('<script src="js/libs/jquery-1.7.min.js">\x3C/script>')</script>

  <!-- FlexSlider -->
  <script defer src="assets/js/flexslider/jquery.flexslider.js"></script>

  <script type="text/javascript">
    $(function(){
      SyntaxHighlighter.all();
    });
    $(window).load(function(){
      $('.flexslider').flexslider({
        animation: "slide",
        slideshow: false,
        slideshowSpeed: 2000,
        pauseOnAction: true,
        pauseOnHover: true,
        start: function(slider){
          $('body').removeClass('loading');
        }
      });
    });
  </script>

  <!-- Syntax Highlighter 
  <script type="text/javascript" src="assets/js/shCore.js"></script>
  <script type="text/javascript" src="assets/js/shBrushXml.js"></script>
  <script type="text/javascript" src="assets/js/shBrushJScript.js"></script>-->

  <!-- Optional FlexSlider Additions 
  <script src="assets/js/jquery.easing.js"></script>
  <script src="assets/js/jquery.mousewheel.js"></script>
  <script defer src="assets/js/demo.js"></script>-->

</body>
</html>



<br><br><br><br>
<p>
<table>
<?php

if (isset($_SESSION['loggedin']) && $_SESSION['loggedin']) 
{
	echo "<form action=\"/createbanner/index\">
    <button type=\"submit\">Add banner</button>
	</form>
	<br><br>";
}
	
	foreach($data as $key => $row) {

		echo $row['name']."<br>".$row['status']."<br>".$row['position']."<br>".$row['URL']."<br>"; 

		if (isset($_SESSION['loggedin']) && $_SESSION['loggedin']) 
		{
			if (($key - 1) >= 0) {

				echo "<form method=\"POST\" action=\"/changeposition/index\">
				<input type=\"hidden\" name=\"id\" value=".$row['id']." />
				<input type=\"hidden\" name=\"change_id\" value=".$data[$key-1]['id']." />
			    <button type=\"submit\">Move up</button>
				</form>";

				echo "<br>";
			} 		

			if (($key + 1) < count($data)) {

				echo "<form method=\"POST\" action=\"/changeposition/index\">
				<input type=\"hidden\" name=\"id\" value=".$row['id']." />
				<input type=\"hidden\" name=\"change_id\" value=".$data[$key+1]['id']." />
			    <button type=\"submit\">Move down</button>
				</form>";

				echo "<br>";
			}
		}

		echo "<img src = ".$row['URL']."> <br>";		

		if (isset($_SESSION['loggedin']) && $_SESSION['loggedin']) 
		{
			echo "<form method=\"POST\" action=\"/deletebanner/index\">
			<input type=\"hidden\" name=\"id\" value=".$row['id']." />
		    <button type=\"submit\">Remove banner</button>
			</form>";		
		
			echo "<br>";		

			echo "<form method=\"GET\" action=\"/editbanner/index\">
			<input type=\"hidden\" name=\"id\" value=".$row['id']." />
		    <button type=\"submit\">Edit banner</button>
			</form>";
		}

		echo "<br><br>";
	
	}	
?>
</table>
</p>
