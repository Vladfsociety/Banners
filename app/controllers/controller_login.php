<?php

class Controller_Login extends Controller
{	

	function action_index()
	{
		$this->set_model("Model_Login");

		if (isset($_SESSION['loggedin']) && $_SESSION['loggedin']) {

			header("Location:".BASE_PAGE);
			exit();			
		}
		else {

			if (isset($_POST['login']) && isset($_POST['password'])) {	

				if ($this->valid_login($_POST['login'])) {

					$login = $_POST['login'];
				}
				else {

					exit("Invalid login");
				}
				if ($this->valid_password($_POST['password'])) {

					$cli_password = $_POST['password'];
				}
				else {

					exit("Invalid password");
				}
				
				$db_user_data = $this->model->db_select_user_data($login);

				if ($cli_password == $db_user_data['password']) {

					$_SESSION['loggedin'] = TRUE;
					$_SESSION['user_name'] = $db_user_data['name'];
					$data["login_status"] = "access_granted";	
					header("Location:".BASE_PAGE);
					exit();
				}
				else {

					$_SESSION['loggedin'] = FALSE;
					$_SESSION['user_name'] = "";
					$data["login_status"] = "access_denied";
				}
			}
			else {

				$_SESSION['loggedin'] = FALSE;
				$_SESSION['user_name'] = "";
				$data["login_status"] = "";
			}
		}		
		
		$this->view->generate('login_view.php', 'auth_template_view.php', $data);
	}	
}
