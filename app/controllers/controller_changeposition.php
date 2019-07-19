<?php

class Controller_Changeposition extends Login_Controller
{

	function action_index()
	{
		$this->set_model("Model_Changeposition");

		if ($_SERVER['REQUEST_METHOD'] == 'POST') {
			
			if ($this->valid_id($_POST['id'])) {

				$id = $_POST['id'];
			}
			else {

				exit("Invalid id");
			}
			if ($this->valid_id($_POST['change_id'])) {

				$change_id = $_POST['change_id'];
			}
			else {

				exit("Invalid id");
			}
			$position = $this->model->db_select_position($id);
			$change_position = $this->model->db_select_position($change_id);

			if ($this->model->db_set_position($id, $position, $change_id, $change_position)) {

				echo "Swap successfully ";
			}
			else {

				exit("Swap failed ");
			}
			
			header("Location:".BASE_PAGE);
			exit();			
		}
		
		$this->view->generate('banner_view.php', 'template_view.php');
	}
}
