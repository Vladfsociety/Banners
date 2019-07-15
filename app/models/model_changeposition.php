<?php

class Model_Changeposition extends Model
{	

	public function db_set_position($id, $position)
	{	
		$clear_id = intval($id);
		$clear_position = intval($position);

		$query = "UPDATE banners SET position = ? WHERE id = ?";

		if ($stmt = static::$mysqli->prepare($query)) {

		    $stmt->bind_param("dd", $clear_position, $clear_id);
		    $stmt->execute();
		    $stmt->close();
		}
		else {

			echo "Update Error";
			return FALSE;
		}

		static::$mysqli->close();
		
		return TRUE;
	}

	public function db_select_position($id)
	{
		$clear_id = intval($id);
		$query = "SELECT position FROM banners WHERE id = ?";

		if ($stmt = static::$mysqli->prepare($query)) {

		    $stmt->bind_param("d", $clear_id);
		    $stmt->execute();
		    $stmt->bind_result($position);
   			$stmt->fetch();
		    $stmt->close();
		}
		else {

			echo "Error getting position";
			exit();
		}

		return $position;
	}
}
