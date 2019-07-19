<?php

class Controller_Editbanner extends Login_Controller
{

	function action_index()
	{			
		$this->set_model("Model_Editbanner");

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
			if ($this->valid_id($_POST['id'])) {

				$id = $_POST['id'];
			}
			else {

				exit("Invalid id");
			}	

			$previous_data_banner = $this->model->db_select_banner($id);

			if (basename($_FILES['userfile']['name']) != null) {

				$file_name = basename($_FILES['userfile']['name']);
				$file_extension_1 = explode(".", $file_name);
				$URL = IMAGES_DIRECTORY.$name.".".$file_extension_1[1];

				if (file_exists($previous_data_banner['URL']) && is_file($previous_data_banner['URL'])) {	

					unlink($previous_data_banner['URL']);
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

				$extension_on_1 = explode(".", $previous_data_banner['URL']);
				$URL = IMAGES_DIRECTORY.$name.".".$extension_on_1[1];

				if (file_exists($previous_data_banner['URL']) && is_file($previous_data_banner['URL'])) {

					if (rename($previous_data_banner['URL'], $URL)) {

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

			$this->view->generate('editbanner_view.php', 'create_edit_template_view.php');
		}
		elseif ($_SERVER['REQUEST_METHOD'] == 'GET') {

			if ($this->valid_id($_GET['id'])) {

				$id = $_GET['id'];
			}
			else {

				exit("Invalid id");
			}

			$data_banner = $this->model->db_select_banner($id);

			$this->view->generate('editbanner_view.php', 'create_edit_template_view.php', $data_banner);
		}
	}
}
