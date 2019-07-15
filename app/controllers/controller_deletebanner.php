<?php

class Controller_Deletebanner extends Controller
{

	function __construct()
	{
		$this->model = new Model_Deletebanner();
		$this->view = new View();
	}

	function action_index()
	{			
		if($_SERVER['REQUEST_METHOD'] == 'POST') {
			
			$id = htmlspecialchars($_POST['id']);			
			$URL = $this->model->db_select_URL($id);

			if ($this->model->db_delete_banner($id) !== TRUE) {

				echo "Удаление неудачно";
				exit();
			}

			if (is_file($URL)) {	

				unlink($URL);
			}
			
			//header('Location:/banner');
		}
		
		$this->view->generate('deletebanner_view.php', 'template_view.php');
	}
}
?>