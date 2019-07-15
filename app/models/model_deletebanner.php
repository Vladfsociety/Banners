<?php

class Model_Deletebanner extends Model
{	

	public function db_delete_banner($id)
	{
		$clear_id = intval($id);	
		$query = "DELETE FROM banners WHERE id = ?";

		if ($stmt = static::$mysqli->prepare($query)) {

		    $stmt->bind_param("d", $clear_id);
		    $stmt->execute();
		    $stmt->close();
		}
		else {

			echo "Removal failed";
			return FALSE;
		}

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
