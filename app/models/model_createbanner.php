<?php

class Model_Createbanner extends Model
{	

	public function db_insert_new_banner($name,	$URL, $status, $position)
	{	
		
		$clear_name = static::$mysqli->real_escape_string($name);
		$clear_URL = static::$mysqli->real_escape_string($URL);
		$clear_status = static::$mysqli->real_escape_string($status);
		$clear_position = intval($position);

		$query = "INSERT INTO ".BANNERS_TABLE." (".NAME_COLUMN.", ".URL_COLUMN.", ".STATUS_COLUMN.", ".POSITION_COLUMN.") VALUES (?, ?, ?, ?)";

		if ($stmt = static::$mysqli->prepare($query)) {

		    $stmt->bind_param("sssd", $clear_name, $clear_URL, $clear_status, $clear_position);
		    if ($stmt->execute()) {

		    	echo "Successful ";
		    }
		    else {

				exit("Input Error ");
		    }
		    $stmt->close();
		}
		else {

			exit("Insert prepare error ");
		}

		static::$mysqli->close();
		
		return TRUE;
	}


	public function db_select_max_position()
	{
		$result = static::$mysqli->query("SELECT (MAX(".POSITION_COLUMN.")+1) as maximum FROM ".BANNERS_TABLE);

		if (($row = $result->fetch_assoc()) !== null) {

			$position = $row['maximum'];
		}
		else {

			exit("Error getting maximum position ");
		}

		return $position;
	}
}
	