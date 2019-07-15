<?php

session_start();

class Controller_Createbanner extends Controller
{

	function __construct()
	{
		$this->model = new Model_Createbanner();
		$this->view = new View();
	}

	function action_index()
	{			
		if ($_SERVER['REQUEST_METHOD'] == 'POST') {

			$name = htmlspecialchars($_POST['name']);
			$status = htmlspecialchars($_POST['Status']);
			$file_name = basename($_FILES['userfile']['name']);
			$file_extension_1 = explode(".", $file_name);
			$new_file = 'assets/images/'.$name.".".$file_extension_1[1];				
			$URL = $new_file;
			$position = $this->model->db_select_max_position();			

			if ($this->model->db_insert_new_banner($name, $URL, $status, $position) === TRUE) {

				echo "Input successful";
			} 
			else {

				echo "Input failed";
				exit();
			}

			clearstatcache();

			if (move_uploaded_file($_FILES['userfile']['tmp_name'], $new_file)) {

				echo "File uploaded to server";
			}
			else {

				echo "File is NOT uploaded to server";
				exit();
			}

			header('Location:/banner');
		}

		$this->view->generate('createbanner_view.php', 'template_view.php');
	}
}
