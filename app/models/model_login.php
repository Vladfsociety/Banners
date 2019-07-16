<?php

class Model_Login extends Model
{

	public function db_select_user_data($login)
	{
		$clear_login = static::$mysqli->real_escape_string($login);

		$query = "SELECT * FROM ".USERS_TABLE." WHERE ".LOGIN_COLUMN." = ?";

		if ($stmt = static::$mysqli->prepare($query)) {

		    $stmt->bind_param("s", $clear_login);
		    if ($stmt->execute()) {

		    	//echo "Successful";
		    }
		    else {

				exit("Select user data failed ");
		    }
   			$result = $stmt->get_result();
    		$user_data = $result->fetch_assoc();
		    $stmt->close();
		}
		else {

			exit("Select user data prepare failed ");
		}

		static::$mysqli->close();

		return $user_data;
	}
}
	