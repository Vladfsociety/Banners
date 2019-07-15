<?php

class Controller_Changeposition extends Controller
{

	function __construct()
	{
		$this->model = new Model_Changeposition();
		$this->view = new View();
	}

	function action_index()
	{			
		if ($_SERVER['REQUEST_METHOD'] == 'POST') {
			
			$id = htmlspecialchars($_POST['id']);			
			$change_id = htmlspecialchars($_POST['change_id']);
			$position = $this->model->db_select_position($id);
			$change_position = $this->model->db_select_position($change_id);

			if (($this->model->db_set_position($id, $change_position) === TRUE) && ($this->model->db_set_position($change_id, $position) === TRUE)) {

				echo "Swap successfully";
			}
			else {

				echo "Swap failed";
				exit();
			}
			
			//header('Location:/banner');
		}
		
		$this->view->generate('changeposition_view.php', 'template_view.php');
	}
}
