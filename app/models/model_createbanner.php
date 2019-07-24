<?php

class Model_Createbanner extends Model
{	

	public function db_insert_new_banner($data)
	{	
		
		$clear_name = static::$mysqli->real_escape_string($data['name']);
		$clear_URL = static::$mysqli->real_escape_string($data['URL']);
		$clear_status = static::$mysqli->real_escape_string($data['status']);
		$clear_position = intval($data['position']);

		$query = "INSERT INTO ".BANNERS_TABLE." (".NAME_COLUMN.", ".URL_COLUMN.", ".STATUS_COLUMN.", ".POSITION_COLUMN.") VALUES (?, ?, ?, ?)";

		if ($this->execute_query($query, array($clear_name, $clear_URL, $clear_status, $clear_position)) === FALSE) {
			return FALSE;
		}
		
		return TRUE;
	}


	public function db_select_max_position()
	{
		$result = static::$mysqli->query("SELECT (MAX(".POSITION_COLUMN.")+1) as maximum FROM ".BANNERS_TABLE);

		if (($row = $result->fetch_assoc()) !== null) {
			$position = $row['maximum'];
		}

		return $position;
	}
}
	