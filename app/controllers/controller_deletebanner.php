<?php

class Controller_Deletebanner extends Login_Controller
{

	function action_index()
	{	
		$this->set_model("Model_Deletebanner");

		if ($_SERVER['REQUEST_METHOD'] == 'POST') {
			
			if ($this->valid_id($_POST['id'])) {

				$id = $_POST['id'];
			}
			else {

				exit("Invalid id");
			}
						
			$URL = $this->model->db_select_URL($id);

			if ($this->model->db_delete_banner($id)) {

				echo "Removal successfully ";
			}
			else {

				exit("Removal failed ");
			}

			if (file_exists($URL) && is_file($URL)) {	

				unlink($URL);
			}
			else {

				exit("File does not exist ");
			}
			
			header("Location:".BASE_PAGE);			
			exit();
		}
		
		$this->view->generate('banner_view.php', 'template_view.php');
	}
}
