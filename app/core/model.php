<?php

class Model
{
	public static $mysqli;

	function __construct() {

		static::$mysqli = new mysqli(HOST, USERNAME, PASSWORD, DATABASE);

		if (static::$mysqli->connect_errno) {

			exit("Connection to db error: ".static::$mysqli->connect_error);
		}
	}
}
