<?php

class Controller_Banner extends Controller
{
	
	function __construct()
	{
		$this->model = new Model_Banner();
		$this->view = new View();
	}

	function action_index()
	{		
		if (isset($_SESSION['loggedin']) && $_SESSION['loggedin']) {

			$data = $this->model->db_select_all();
		}
		else {

			$data = $this->model->db_select_all_enabled();				
		}

		$this->view->generate('banner_view.php', 'template_view.php', $data);
	}
}
