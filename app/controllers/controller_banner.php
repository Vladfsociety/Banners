<?php

class Controller_Banner extends Controller
{

	function action_index()
	{		
		$this->set_model("Model_Banner");

		if (isset($_SESSION['loggedin']) && $_SESSION['loggedin']) {
			$data = $this->model->db_select_all();
		} else {
			$data = $this->model->db_select_all_enabled();
		}

		$this->view->generate('banner_view.php', 'template_view.php', $data);
	}
}
