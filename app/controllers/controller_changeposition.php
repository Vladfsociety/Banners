<?php

class Controller_Changeposition extends Login_Controller
{

	function action_index()
	{
		$this->set_model("Model_Changeposition");

		if ($_SERVER['REQUEST_METHOD'] == 'POST') {

			if (!isset($_POST['id']) && !isset($_POST['change_id'])) {
				header("Location:".BASE_PAGE);
				exit();
			}

			$data['id'] = $_POST['id'];
			$data['change_id'] = $_POST['change_id'];

			$error = $this->validate($data);

			if (count($error) !== 0) {
				header("Location:".BASE_PAGE);
				exit();
			}

			if (($data['position'] = $this->model->db_select_position($data['id'])) === FALSE) {
				header("Location:".BASE_PAGE);
				exit();
			}

			if (($data['change_position'] = $this->model->db_select_position($data['change_id'])) === FALSE) {
				header("Location:".BASE_PAGE);
				exit();
			}

			if ($this->model->db_set_position($data) === FALSE) {
				header("Location:".BASE_PAGE);
				exit();
			}
			
			header("Location:".BASE_PAGE);
			exit();			
		}
		
		$this->view->generate('banner_view.php', 'template_view.php');
	}
}
