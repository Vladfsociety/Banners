<?php

class Controller_Editbanner extends Login_Controller
{

	function action_index()
	{			
		$this->set_model("Model_Editbanner");		

		if ($_SERVER['REQUEST_METHOD'] == 'POST') {

			if (!isset($_POST['id']) && !isset($_POST['status']) && !isset($_POST['name'])) {
				header("Location:".BASE_PAGE);
				exit();
			}

			$data['id'] = $_POST['id'];
			$data['name'] = $_POST['name'];
			$data['status'] = $_POST['status'];			
			
			$error = $this->validate($data);

			if (array_key_exists('invalid_id', $error)) {
				header("Location:".BASE_PAGE);
				exit();
			}

			if (($previous_data = $this->model->db_select_banner($data['id'])) === FALSE) {
				header("Location:".BASE_PAGE);
				exit();
			}

			if (count($error) !== 0) {
				$previous_data += $error;
				return $this->view->generate('editbanner_view.php', 'create_edit_template_view.php', $previous_data);
			}

			if (($data['URL'] = $this->edit_file($data['name'], $previous_data['URL'])) === FALSE) {
				$error['other_error'] = TRUE;
				$previous_data += $error;
				return $this->view->generate('editbanner_view.php', 'create_edit_template_view.php', $previous_data);
			}
			
			if ($this->model->db_update_banner($data) === FALSE) {
				$error['other_error'] = TRUE;
				$previous_data += $error;
				return $this->view->generate('editbanner_view.php', 'create_edit_template_view.php', $previous_data);
			}

			header("Location:".BASE_PAGE);
			exit();	

		}
		elseif ($_SERVER['REQUEST_METHOD'] == 'GET') {		

			if (!isset($_GET['id'])) {
				header("Location:".BASE_PAGE);
				exit();
			}	

			$data['id'] = $_GET['id'];
			
			$error = $this->validate($data);

			if (count($error) !== 0) {
				header("Location:".BASE_PAGE);
				exit();
			}

			if (($previous_data = $this->model->db_select_banner($data['id'])) === FALSE) {
				$error['other_error'] = TRUE;
				$previous_data += $error;
				return $this->view->generate('editbanner_view.php', 'create_edit_template_view.php', $error);
			}

			$this->view->generate('editbanner_view.php', 'create_edit_template_view.php', $previous_data);
		}
	}
}
