<style>
  .navbar .nav {
  margin: 15px 10px 0 0;
  }
  .navbar .nav > li {
  margin-right: 30px;
  } 


  .flex-direction-nav a  {
  line-height: 40px;
  }
</style>

<div>
	<?php
	if (isset($_SESSION['loggedin']) && $_SESSION['loggedin']) {

		echo "<form action=\"/createbanner/index\">
	    <button class=\"btn btn-large btn-success\" type=\"submit\">Add banner</button>
		</form>";
	}
	?>	  
	      <section class="slider">
	        <div class="flexslider">
	          <ul class="slides">	            	
	            	<?php 
	            	foreach($data as $key => $row) {
	            		echo "<li>";?>	
					       	<div class="navbar">
					          <ul class="nav">					              
								<?php
								if (isset($_SESSION['loggedin']) && $_SESSION['loggedin']) 
								{
									if (($key - 1) >= 0) {
										?>
										<li>
										<?php
										echo "<form method=\"POST\" action=\"/changeposition/index\">
										<input type=\"hidden\" name=\"id\" value=".$row['id']." />
										<input type=\"hidden\" name=\"change_id\" value=".$data[$key-1]['id']." />
									    <button class=\"btn btn-large btn-secondary\" type=\"submit\">Move left</button>
										</form>
										";?>
										</li>
										<?php
									} 		
									if (($key + 1) < count($data)) {
										?>
										<li>
										<?php
										echo "<form method=\"POST\" action=\"/changeposition/index\">
										<input type=\"hidden\" name=\"id\" value=".$row['id']." />
										<input type=\"hidden\" name=\"change_id\" value=".$data[$key+1]['id']." />
									    <button class=\"btn btn-large btn-secondary\" type=\"submit\">Move right</button>
										</form>
										";?>
										</li>
										<?php
									}
								}
								?>
							  </ul>
					        </div><!-- /.navbar -->				      
						
						<?php

						echo "<img src = ".$row['URL'].">";

						?>
					       	<div class="navbar">
					          <ul class="nav">					              
								<?php
								if (isset($_SESSION['loggedin']) && $_SESSION['loggedin']) 
								{
									?>
									<li class="right">
									<?php									
									echo "<form method=\"POST\" action=\"/deletebanner/index\">
									<input type=\"hidden\" name=\"id\" value=".$row['id']." />
								    <button class=\"btn btn-large btn-danger\" type=\"submit\">Remove banner</button>
									</form>";?>
									</li>
									<?php		

									?>
									<li>
									<?php
									echo "<form method=\"GET\" action=\"/editbanner/index\">
									<input type=\"hidden\" name=\"id\" value=".$row['id']." />
								    <button class=\"btn btn-large btn-secondary\" type=\"submit\">Edit banner</button>
									</form>";?>
									</li>
									<?php
								}
								?>
						 	  </ul>
					        </div><!-- /.navbar -->					      
						<?php
						echo "</li>";	
					}
					?> 
	          </ul>	
	        </div>
	      </section>
	  <script src="http://ajax.googleapis.com/ajax/libs/jquery/1/jquery.min.js"></script>
	  <script defer src=<?php echo JS_FLEXSLIDER_DIRECTORY."jquery.flexslider.js"; ?>></script>

	  <script type="text/javascript">
	    $(function(){
	      SyntaxHighlighter.all();
	    });
	    $(window).load(function(){
	      $('.flexslider').flexslider({
	        animation: "slide",
	        slideshow: true,
	        slideshowSpeed: 4000,
	        pauseOnAction: true,
	        pauseOnHover: true,
	        start: function(slider){
	          $('body').removeClass('loading');
	        }
	      });
	    });
	  </script>
</div>
