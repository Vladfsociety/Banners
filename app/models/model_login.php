<?php

class Model_Login extends Model
{

	public function db_select_user_data($login)
	{	
		$mysqli = Model_Login::db_connect();

		$query = sprintf("SELECT * FROM users WHERE login = '%s'", $login);
		$result = $mysqli->query($query);
		$user_data = $result->fetch_assoc();

		$mysqli->close();

		return $user_data;
	}
}
?>	