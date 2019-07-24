<?php

class Model_Login extends Model
{

	public function db_select_user_data($data)
	{
		$clear_login = static::$mysqli->real_escape_string($data['login']);

		if (!$this->in_db($clear_login, USERS_TABLE, LOGIN_COLUMN)) {
			return FALSE;
		}

		$query = "SELECT * FROM ".USERS_TABLE." WHERE ".LOGIN_COLUMN." = ?";

		if ($stmt = static::$mysqli->prepare($query)) {

		    $stmt->bind_param("s", $clear_login);
		    if (!($stmt->execute())) {
		    	return FALSE;
		    }
   			$result = $stmt->get_result();
    		$user_data = $result->fetch_assoc();
		    $stmt->close();
		}
		else {
			return FALSE;
		}		

		return $user_data;
	}
}
	