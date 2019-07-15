<?php

session_start();

class Controller_Logout extends Controller
{	
	
	function action_index()
	{
		session_destroy();	
		//header("Location: /");
		
		$this->view->generate('logout_view.php', 'auth_template_view.php');
	}
	
}
?>