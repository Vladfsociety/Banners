<?php
class Model
{
	function db_connect() {

		require(dirname(__FILE__)."/../../config.php");

		$mysqli = new mysqli($host, $username, $password, $database);

		if ($mysqli->connect_errno) {

			printf("Не удалось подключиться: %s\n", $mysqli->connect_error);
			exit();
		}

		return $mysqli;
	}
}
?>