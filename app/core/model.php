<?php

class Model
{
	public static $mysqli;

	function __construct() {

		require(dirname(__FILE__)."/../../config.php");

		static::$mysqli = new mysqli($host, $username, $password, $database);

		if (static::$mysqli->connect_errno) {

			printf("Connection error: %s\n", static::$mysqli->connect_error);
			exit();
		}
	}
}
