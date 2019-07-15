<?php

class Model_Createbanner extends Model
{	

	public function db_insert_new_banner($name,	$URL, $status, $position)
	{	
		
		$clear_name = static::$mysqli->real_escape_string($name);
		$clear_URL = static::$mysqli->real_escape_string($URL);
		$clear_status = static::$mysqli->real_escape_string($status);
		$clear_position = intval($position);

		$query = "INSERT INTO banners (name, URL, status, position) VALUES (?, ?, ?, ?)";

		if ($stmt = static::$mysqli->prepare($query)) {

		    $stmt->bind_param("sssd", $clear_name, $clear_URL, $clear_status, $clear_position);
		    $stmt->execute();
		    $stmt->close();
		}
		else {

			echo "Input Error";
			return FALSE
		}

		static::$mysqli->close();
		
		return TRUE;
	}


	public function db_select_max_position()
	{
		$result = static::$mysqli->query("SELECT (MAX(position)+1) as maximum FROM banners");
		if (($row = $result->fetch_assoc()) !== null) {

			$position = $row['maximum'];
		}
		else {

			echo "Error getting maximum position";
			exit();
		}

		return $position;
	}
}
	