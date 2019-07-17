<?php

class Controller_Login extends Controller
{	

	function __construct()
	{
		$this->model = new Model_Login();
		$this->view = new View();
	}

	function action_index()
	{
		if (isset($_SESSION['loggedin']) && $_SESSION['loggedin']) {

			exit("Logged out first ");			
		}
		else {

			if (isset($_POST['login']) && isset($_POST['password'])) {	

				$login = htmlspecialchars($_POST['login']);
				$cli_password = htmlspecialchars($_POST['password']);	
				$db_user_data = $this->model->db_select_user_data($login);

				if ($cli_password == $db_user_data['password']) {

					$_SESSION['loggedin'] = TRUE;
					$_SESSION['user_name'] = $db_user_data['name'];
					$data["login_status"] = "access_granted";	
					header('Location:/');	
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
