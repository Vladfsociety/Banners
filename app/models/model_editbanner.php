<?php

//i; delete from banners; update banners set name=img1

class Model_Editbanner extends Model
{	

	public function db_update_banner($data)
	{
		$clear_name = static::$mysqli->real_escape_string($data['name']);
		$clear_URL = static::$mysqli->real_escape_string($data['URL']);
		$clear_status = static::$mysqli->real_escape_string($data['status']);
		$clear_id = intval($data['id']);

		if (!$this->in_db($clear_id, BANNERS_TABLE, ID_COLUMN)) {
			return FALSE;
		}
		
		$query = "UPDATE ".BANNERS_TABLE." SET ".NAME_COLUMN." = ?, ".URL_COLUMN." = ?, ".STATUS_COLUMN." = ? WHERE ".ID_COLUMN." = ?";

		if ($this->execute_query($query, array($clear_name, $clear_URL, $clear_status, $clear_id)) === FALSE) {
			return FALSE;
		}
		
		return TRUE;
	}


	public function db_select_banner($id)
	{
		$clear_id = intval($id); 

		if (!$this->in_db($clear_id, BANNERS_TABLE, ID_COLUMN)) {			
			return FALSE;
		}

		$query = "SELECT ".ID_COLUMN.", ".NAME_COLUMN.", ".URL_COLUMN.", ".STATUS_COLUMN." FROM ".BANNERS_TABLE." WHERE ".ID_COLUMN." = ?";

		if ($stmt = static::$mysqli->prepare($query)) {

		    $stmt->bind_param("d", $clear_id);
		    if (!($stmt->execute())) {
		    	return FALSE;
		    }
		    $stmt->bind_result($id, $name, $URL, $status);
   			$stmt->fetch();
		    $stmt->close();
		}
		else {
			return FALSE;
		}

		$data = ["id"=>$id, "name"=>$name, "URL"=>$URL, "status"=>$status];

		return $data;
	}
}
	