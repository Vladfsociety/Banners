<?php

session_start();

class Controller_Rotatortest extends Controller
{
	
	function action_index()
	{		
		$this->view->generate('rotatortest_view.php', 'template_view.php');
	}
}
