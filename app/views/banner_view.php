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
		?>
		<form action="/createbanner/index">
	    <button class="btn btn-large btn-success" type="submit">Add banner</button>
		</form>
		<?php
	}
	?>	  
	      <section class="slider">
	        <div class="flexslider">
	          <ul class="slides">	            	
	            	<?php 
	            	foreach($data as $key => $row) {
	            		?> 
	            		<li>	
					       	<div class="navbar">
					          <ul class="nav">					              
								<?php
								if (isset($_SESSION['loggedin']) && $_SESSION['loggedin']) {

									if (($key - 1) >= 0) {
										?>
										<li>
										<form method="POST" action="/changeposition/index">
										<input type="hidden" name="id" value="<?php echo htmlspecialchars($row['id']); ?>">
										<input type="hidden" name="change_id" value="<?php echo htmlspecialchars($data[$key-1]['id']); ?>">
									    <button class="btn btn-large btn-secondary" type="submit">Move left</button>
										</form>
										</li>
										<?php
									} 		
									if (($key + 1) < count($data)) {
										?>
										<li>
										<form method="POST" action="/changeposition/index">
										<input type="hidden" name="id" value="<?php echo htmlspecialchars($row['id']); ?>">
										<input type="hidden" name="change_id" value="<?php echo htmlspecialchars($data[$key+1]['id']); ?>">
									    <button class="btn btn-large btn-secondary" type="submit">Move right</button>
										</form>
										</li>
										<?php
									}
								}
								?>
							  </ul>
					        </div><!-- /.navbar -->	

						<img src="<?php echo htmlspecialchars($row['URL']); ?>">

					       	<div class="navbar">
					          <ul class="nav">					              
								<?php
								if (isset($_SESSION['loggedin']) && $_SESSION['loggedin']) 
								{
									?>
									<li>									
									<form class="form" method="POST" action="/deletebanner/index">
									<input type="hidden" name="id" value="<?php echo htmlspecialchars($row['id']); ?>">
								    <button class="btn btn-large btn-danger" id="del" type="submit">Remove banner</button>
									</form>
									</li>

									<li>
									<form class="form" method="GET" action="/editbanner/index">
									<input type="hidden" name="id" value="<?php echo htmlspecialchars($row['id']); ?>">
								    <button class="btn btn-large btn-secondary" id="edt" type="submit">Edit banner</button>
									</form>
									</li>
									<?php
								}
								?>
						 	  </ul>
					        </div><!-- /.navbar -->
						</li>
						<?php
					}
					?> 
	          </ul>	
	        </div>
	      </section>
	  <script src="http://ajax.googleapis.com/ajax/libs/jquery/1/jquery.min.js"></script>
	  <script defer src="<?php echo htmlspecialchars(JS_FLEXSLIDER_DIRECTORY."jquery.flexslider.js"); ?>"></script>

	  <script>
	    $(window).load(function(){
	      $('.flexslider').flexslider({
	        animation: "slide",
	        slideshow: true,
	        slideshowSpeed: 4000,
	        pauseOnAction: true,
	        pauseOnHover: true,
	      });
	    });
	  </script>
</div>
