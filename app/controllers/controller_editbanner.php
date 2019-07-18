<?php

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

			$name = $_POST['name'];
			$status = $_POST['Status'];
			$id = $_POST['id'];
			$previous_URL = $this->model->db_select_URL($id);

			if (basename($_FILES['userfile']['name']) != null) {

				$file_name = basename($_FILES['userfile']['name']);
				$file_extension_1 = explode(".", $file_name);
				$URL = IMAGES_DIRECTORY.$name.".".$file_extension_1[1];

				if (file_exists($previous_URL) && is_file($previous_URL)) {	

					unlink($previous_URL);
				}
				else {

					exit("File does not exist ");
				}

				if (move_uploaded_file($_FILES['userfile']['tmp_name'], $URL)) {

					echo "File uploaded to server ";
				}
				else {

					exit("File is NOT uploaded to server ");
				}
			}
			else {

				$extension_on_1 = explode(".", $previous_URL);
				$URL = IMAGES_DIRECTORY.$name.".".$extension_on_1[1];

				if (file_exists($previous_URL) && is_file($previous_URL)) {

					if (rename($previous_URL, $URL)) {

						echo "File renamed ";
					} 
					else {
						
						exit("Failed to rename file ");
					}
				} 
				else {

					exit("File does not exist ");
				}	
			}	
			
			if ($this->model->db_update_banner($name, $URL, $status, $id)) {

				echo "Update successfully ";
			}
			else {

				exit("Update failed ");
			}				
			
			header("Location:".BASE_PAGE);
			exit();
		}
		
		$this->view->generate('editbanner_view.php', 'create_edit_template_view.php');
	}
}
