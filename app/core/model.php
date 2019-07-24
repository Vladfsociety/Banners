<?php

class Model
{
	
	protected static $mysqli;


	function __construct() {

		static::$mysqli = new mysqli(HOST, USERNAME, PASSWORD, DATABASE);

		if (static::$mysqli->connect_errno) {
			header($_SERVER['SERVER_PROTOCOL'].' 500 Internal Server Error', true, 500);
		}
	}	


	function __destruct()
	{
		static::$mysqli->close();
	}


	protected function in_db($value, $table_name, $col_name) {

		switch (gettype($value)) {
			case "string":
				$type = "s";
				break;
			case "integer":
				$type = "d";
				break;
			default:
				$type = null;
				break;
		}

		$query = "SELECT count(".$col_name.") FROM ".$table_name." WHERE ".$col_name." = ?";		

		if ($stmt = static::$mysqli->prepare($query)) {

		    $stmt->bind_param($type, $value);
		    if (!($stmt->execute())) {		    	
		    	return FALSE;
		    }
		    $stmt->bind_result($result);
   			$stmt->fetch();
		    $stmt->close();		    
		}
		else {
			return FALSE;
		}

		if ($result == 0) {
			return FALSE;
		}

		return TRUE;
	}

	protected function execute_query($query, $data, $fetch=FALSE)
	{	
		$type = "";
		$iter = 0;
		
		foreach ($data as $key => $value) {
			$param[$iter] = $value;
			$iter++;
			switch (gettype($value)) {
				case "string":
					$type .= "s";
					break;
				case "integer":
					$type .= "d";
					break;
				default:
					break;
			}
		}

		if ($stmt = static::$mysqli->prepare($query)) {

		    $stmt->bind_param($type, ...$param);
		    if (!($stmt->execute())) {
		    	return FALSE;
		    }
		    if ($fetch === TRUE) {
		    	$stmt->bind_result($result);
   				$stmt->fetch();
		    }
		    $stmt->close();
		}
		else {
			return FALSE;
		}

		if ($fetch === TRUE) {
		    return $result;
		}
		return TRUE;
	}
	
}
