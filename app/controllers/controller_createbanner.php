<?php

class Controller_Createbanner extends Login_Controller
{

	function action_index()
	{			
		$this->set_model("Model_Createbanner");

		if ($_SERVER['REQUEST_METHOD'] == 'POST') {

			if ($this->valid_name($_POST['name'])) {

				$name = $_POST['name'];
			}
			else {

				exit("Invalid name");
			}
			if ($this->valid_status($_POST['status'])) {

				$status = $_POST['status'];
			}
			else {

				exit("Invalid status");
			}
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
