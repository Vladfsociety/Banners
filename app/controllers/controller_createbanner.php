<?php

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

			$name = $_POST['name'];
			$status = $_POST['Status'];
			$file_name = basename($_FILES['userfile']['name']);
			$file_extension_1 = explode(".", $file_name);
			$URL = IMAGES_DIRECTORY.$name.".".$file_extension_1[1];
			$position = $this->model->db_select_max_position();			

			if ($this->model->db_insert_new_banner($name, $URL, $status, $position)) {

				echo "Input successful ";
			} 
			else {

				exit("Input failed ");
			}

			if (move_uploaded_file($_FILES['userfile']['tmp_name'], $URL)) {

				echo "File uploaded to server ";
			}
			else {

				exit("File is NOT uploaded to server ");
			}

			header("Location:".BASE_PAGE);
			exit();
		}

		$this->view->generate('createbanner_view.php', 'create_edit_template_view.php');
	}
}
