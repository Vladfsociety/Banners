<?php

class Controller {
	
	protected $model;
	protected $view;

	
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
		if (strval(intval($id)) == $id) {
			return TRUE;
		}
		else {
			return FALSE;
		}
	}


	protected function valid_password($password)
	{
		if (strval(intval($password)) == $password) {
			return TRUE;
		}
		else {
			return FALSE;
		}
	}


	protected function validate($data) 
	{
		$error = [];

		foreach ($data as $key => $value) {
			$real_key = explode("_", $key);
			$var_name = $real_key[count($real_key)-1];
			$valid_func = "valid_".$var_name;
			if (!$this->$valid_func($value)) {
				$error['invalid_'.$var_name] = TRUE;
			}
		}

		return $error;
	}


	protected function load_file($name)
	{
		if (!isset($_FILES['userfile'])) {
			return FALSE;
		}
		$file_name = basename($_FILES['userfile']['name']);
		$file_extension_1 = explode(".", $file_name);
		$URL = IMAGES_DIRECTORY.$name.".".$file_extension_1[1];		

		if (move_uploaded_file($_FILES['userfile']['tmp_name'], $URL) === FALSE) {
			return FALSE;
		} 
		return $URL;
	}

	
	protected function delete_file($URL)
	{	
		if (file_exists($URL) && is_file($URL)) {	
			unlink($URL);
		} else {
			return FALSE;
		}

		return TRUE;
	}


	protected function reload_file($name, $previous_URL)
	{
		if (!isset($_FILES['userfile'])) {
			return FALSE;
		}
		$file_name = basename($_FILES['userfile']['name']);
		$file_extension_1 = explode(".", $file_name);
		$URL = IMAGES_DIRECTORY.$name.".".$file_extension_1[1];

		if (file_exists($previous_URL) && is_file($previous_URL)) {	
			unlink($previous_URL);
		} else {
			return FALSE;
		}

		if (move_uploaded_file($_FILES['userfile']['tmp_name'], $URL) === FALSE) {
			return FALSE;
		}

		return $URL;
	}


	protected function rename_file($name, $previous_URL)
	{
		$extension_on_1 = explode(".", $previous_URL);
		$URL = IMAGES_DIRECTORY.$name.".".$extension_on_1[1];

		if (file_exists($previous_URL) && is_file($previous_URL)) {

			if (rename($previous_URL, $URL) === FALSE) {
				return FALSE;
			}
		} 
		else {
			return FALSE;
		}

		return $URL;
	}
	

	protected function edit_file($name, $previous_URL)
	{
		if (basename($_FILES['userfile']['name']) != null) {

			if (($URL = $this->reload_file($name, $previous_URL)) === FALSE) {
				return FALSE;
			}
		} 
		else {
					
			if (($URL = $this->rename_file($name, $previous_URL)) === FALSE) {
				return FALSE;
			}
		}

		return $URL;
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
