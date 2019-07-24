<?php

class Controller_Deletebanner extends Login_Controller
{

	function action_index()
	{	
		$this->set_model("Model_Deletebanner");		

		if ($_SERVER['REQUEST_METHOD'] == 'POST') {

			if (!isset($_POST['id'])) {
				header("Location:".BASE_PAGE);
				exit();
			}

			$data['id'] = $_POST['id'];
			
			$error = $this->validate($data);

			if (count($error) !== 0) {
				header("Location:".BASE_PAGE);
				exit();
			}	

			if (($data['URL'] = $this->model->db_select_URL($data['id'])) === FALSE) {
				$error['other_error'] = TRUE;
				return $this->view->generate('deletebanner_view.php', 'template_view.php', $error);
			}

			if ($this->delete_file($data['URL']) === FALSE) {
				$error['other_error'] = TRUE;
				return $this->view->generate('deletebanner_view.php', 'template_view.php', $error);
			}				
			
			if (($this->model->db_delete_banner($data['id'])) === FALSE) {
				$error['other_error'] = TRUE;
				return $this->view->generate('deletebanner_view.php', 'template_view.php', $error);
			}
			
			return $this->view->generate('deletebanner_view.php', 'template_view.php', $error);
		}
	}
}
