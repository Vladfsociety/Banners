<?php

class Controller_Logout extends Controller
{	
	
	function action_index()
	{	
		$_SESSION['user_name'] = null;
		$_SESSION['loggedin'] = null;

		session_destroy();	

		header("Location: /");
		
		$this->view->generate('banner_view.php', 'template_view.php');
	}
	
}
