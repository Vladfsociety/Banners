<?php

class Controller {
	
	public $model;
	public $view;
	
	function __construct()
	{
		$this->view = new View();
	}


	protected function set_model($model_name)
	{
		$this->model = new $model_name();
	}


	protected function valid_name($name)
	{
		if (!is_string($name)) {

			return FALSE;
		}

		if (strlen($name) > 30) {

			return FALSE;
		}
		elseif (strlen($name) < 4) {

			return FALSE;
		}
		else {

			return TRUE;
		}
	}

	protected function valid_login($login)
	{
		if (!is_string($login)) {

			return FALSE;
		}

		if (strlen($login) > 30) {

			return FALSE;
		}
		elseif (strlen($login) < 4) {

			return FALSE;
		}
		else {

			return TRUE;
		}
	}
	

	protected function valid_status($status)
	{
		if (!is_string($status)) {

			return FALSE;
		}

		$status_array = [ENABLED, DISABLED];

		if (in_array($status, $status_array, $strict=TRUE)) {

			return TRUE;
		}
		else {

			return FALSE;
		}
	}


	protected function valid_id($id)
	{
		if (intval($id) == $id) {

			return TRUE;
		}
		else {

			return FALSE;
		}
	}

	protected function valid_password($password)
	{
		if (intval($password) == $password) {

			return TRUE;
		}
		else {

			return FALSE;
		}
	}

}


class Login_Controller extends Controller {

	function __construct()
	{
		$this->view = new View();

		if (!(isset($_SESSION['loggedin']) && $_SESSION['loggedin'])) {

			header("Location:".LOGIN_PAGE);
			exit();	
		}
	}
}
