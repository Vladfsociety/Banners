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

				$data['login'] = $_POST['login'];
				$data['password'] = $_POST['password'];

				$error = $this->validate($data);

				if (count($error) !== 0) {
					return $this->view->generate('login_view.php', 'auth_template_view.php', $error);
				}
				
				if (($db_user_data = $this->model->db_select_user_data($data)) === FALSE) {
					$error['other'] = TRUE;
					return $this->view->generate('login_view.php', 'auth_template_view.php', $error);
				}
				
				if ($data['password'] == $db_user_data['password']) {
					$_SESSION['loggedin'] = TRUE;
					$_SESSION['user_name'] = $db_user_data['name'];					
					header("Location:".BASE_PAGE);
					exit();
				}
				else {
					$_SESSION['loggedin'] = FALSE;
					$_SESSION['user_name'] = "";
					$error['uncorrect_password'] = TRUE;
				}
			}
			else {
				$_SESSION['loggedin'] = FALSE;
				$_SESSION['user_name'] = "";
				$error = [];
			}
		}		
		
		$this->view->generate('login_view.php', 'auth_template_view.php', $error);
	}	
}
