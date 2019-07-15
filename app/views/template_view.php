<?php //session_start(); ?>
<html>
	<head>
	</head>
	<body>
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

					if (isset($_SESSION['loggedin']) && $_SESSION['loggedin'] === TRUE)
					{
						echo $_SESSION['user_name'];
						?> <a href="/logout/index">Logout</a> <?php
					} 
					else {
						?> <a href="/login/index">Login</a> <?php
					}
				?>
			</div>			
				<div id="menu">
					<a href="/">Главная</a>
				</div>
				<div id="page">
					<div id="sidebar">
					</div>
				</div>
				<div id="content">
					<div class="box">
						<?php include 'app/views/'.$content_view; ?>
					</div>
					<br class="clearfix" />
				</div>
				
	</body>
</html>