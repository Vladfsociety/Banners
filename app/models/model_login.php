<?php

class Model_Login extends Model
{

	public function db_select_user_data($login)
	{
		$clear_login = static::$mysqli->real_escape_string($login);

		$query = "SELECT * FROM users WHERE login = ?";

		if ($stmt = static::$mysqli->prepare($query)) {

		    $stmt->bind_param("s", $clear_login);
		    $stmt->execute();
   			$result = $stmt->get_result();
    		$user_data = $result->fetch_assoc();
		    $stmt->close();
		}
		else {

			echo "ERROR";
			exit();
		}

		static::$mysqli->close();

		return $user_data;
	}
}
	