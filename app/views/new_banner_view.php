<div>
	<?php
		if (isset($_SESSION['loggedin']) && $_SESSION['loggedin']) 
	{
		echo "<form action=\"/createbanner/index\">
	    <button class=\"btn btn-large btn-success\" type=\"submit\">Add banner</button>
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
							    <button class=\"btn btn-large btn-secondary\" type=\"submit\">Move left</button>
								</form>";

								echo "<br>";
							} 		

							if (($key + 1) < count($data)) {

								echo "<form method=\"POST\" action=\"/changeposition/index\">
								<input type=\"hidden\" name=\"id\" value=".$row['id']." />
								<input type=\"hidden\" name=\"change_id\" value=".$data[$key+1]['id']." />
							    <button class=\"btn btn-large btn-secondary\" type=\"submit\">Move right</button>
								</form>";

								echo "<br>";
							}
						}

						echo "<img src = ".$row['URL']."> <br>";		

						if (isset($_SESSION['loggedin']) && $_SESSION['loggedin']) 
						{
							echo "<form method=\"POST\" action=\"/deletebanner/index\">
							<input type=\"hidden\" name=\"id\" value=".$row['id']." />
						    <button class=\"btn btn-large btn-danger\" type=\"submit\">Remove banner</button>
							</form>";		
						
							echo "<br>";		

							echo "<form method=\"GET\" action=\"/editbanner/index\">
							<input type=\"hidden\" name=\"id\" value=".$row['id']." />
						    <button class=\"btn btn-large btn-secondary\" type=\"submit\">Edit banner</button>
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
</div>
