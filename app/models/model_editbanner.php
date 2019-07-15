<?php

//i; delete from banners; update banners set name=img1

class Model_Editbanner extends Model
{	

	public function db_update_banner($name, $URL, $status, $id)
	{
		$clear_name = static::$mysqli->real_escape_string($name);
		$clear_URL = static::$mysqli->real_escape_string($URL);
		$clear_status = static::$mysqli->real_escape_string($status);
		$clear_id = intval($id);
		$query = "UPDATE banners SET name = ?, URL = ?, status = ? WHERE id = ?";

		if ($stmt = static::$mysqli->prepare($query)) {

		    $stmt->bind_param("sssd", $clear_name, $clear_URL, $clear_status, $clear_id);
		    $stmt->execute();
		    $stmt->close();
		}
		else {

			echo "Update error";
			return FALSE;

		static::$mysqli->close();	
		
		return TRUE;
	}


	public function db_select_URL($id)
	{
		$clear_id = intval($id);
		$query = "SELECT URL FROM banners WHERE id = ?";

		if ($stmt = static::$mysqli->prepare($query)) {

		    $stmt->bind_param("d", $clear_id);
		    $stmt->execute();
		    $stmt->bind_result($URL);
   			$stmt->fetch();
		    $stmt->close();
		}
		else {

			echo "Error getting URL";
			exit();
		}

		return $URL;
	}
}
	