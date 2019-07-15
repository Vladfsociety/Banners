<?php

session_start();

class Controller_Editbanner extends Controller
{

	function __construct()
	{
		$this->model = new Model_Editbanner();
		$this->view = new View();
	}


	function action_index()
	{			
		if ($_SERVER['REQUEST_METHOD'] == 'POST') {

			$name = htmlspecialchars($_POST['name']);
			$status = htmlspecialchars($_POST['Status']);
			$id = $_POST['id'];
			$previous_URL = $this->model->db_select_URL($id);
			$extension_on_1 = explode(".", $previous_URL);
			$URL = "assets/images/".$name.".".$extension_on_1[1];

			if ($this->model->db_update_banner($name, $URL, $status, $id) !== TRUE) {

				echo "Обновление неудачно";
				exit();
			}
			
			if (rename($previous_URL, $URL)) {

				echo "Файл переименован";
			} 
			else {

				echo "Не удалось переименовать файл";
			}

			header('Location:/banner');
		}
		$this->view->generate('editbanner_view.php', 'template_view.php');
	}
}
?>