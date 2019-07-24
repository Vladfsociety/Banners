<?php

class Controller_Createbanner extends Login_Controller
{

	function action_index()
	{			
		$this->set_model("Model_Createbanner");

		if ($_SERVER['REQUEST_METHOD'] == 'POST') {

			if (!isset($_POST['name']) && !isset($_POST['status'])) {
				header("Location:".BASE_PAGE);
				exit();
			}

			$data['name'] = $_POST['name'];
			$data['status'] = $_POST['status'];	

			$error = $this->validate($data);

			if (count($error) !== 0) {
				return $this->view->generate('createbanner_view.php', 'create_edit_template_view.php', $error);
			}

			$data['position'] = $this->model->db_select_max_position();	

			if (($data['URL'] = $this->load_file($data['name'])) === FALSE) {
				$error['other_error'] = TRUE;
				return $this->view->generate('createbanner_view.php', 'create_edit_template_view.php', $error);
			}

			if ($this->model->db_insert_new_banner($data) === FALSE) {
				$this->delete_file($data['URL']);
				$error['other_error'] = TRUE;
				return $this->view->generate('createbanner_view.php', 'create_edit_template_view.php', $error);
			}

			header("Location:".BASE_PAGE);
			exit();
		}

		$error = [];

		$this->view->generate('createbanner_view.php', 'create_edit_template_view.php', $error);
	}
}
