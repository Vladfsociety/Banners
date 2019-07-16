<?php

class Model_Changeposition extends Model
{	

	public function db_set_position($id, $position, $change_id, $change_position)
	{	
		$clear_id = intval($id);
		$clear_position = intval($position);
		$clear_change_id = intval($change_id);
		$clear_change_position = intval($change_position);

		$query = "UPDATE ".BANNERS_TABLE." SET ".POSITION_COLUMN." = ? WHERE ".ID_COLUMN." = ?";

		if ($stmt = static::$mysqli->prepare($query)) {

		    $stmt->bind_param("dd", $clear_change_position, $clear_id);
		    if ($stmt->execute()) {

		    	echo "Successful ";
		    }
		    else {

		    	echo "First update Error ";
				return FALSE;
		    }
		    $stmt->close();
		}
		else {

			echo "First update prepare Error ";
			return FALSE;
		}

		if ($stmt = static::$mysqli->prepare($query)) {

		    $stmt->bind_param("dd", $clear_position, $clear_change_id);
		    if ($stmt->execute()) {

		    	echo "Successful ";
		    }
		    else {

		    	echo "Second update Error ";
				return FALSE;
		    }
		    $stmt->close();
		}
		else {

			echo "Second update prepare Error ";
			return FALSE;
		}

		static::$mysqli->close();
		
		return TRUE;
	}

	public function db_select_position($id)
	{
		$clear_id = intval($id);
		
		$query = "SELECT ".POSITION_COLUMN." FROM ".BANNERS_TABLE." WHERE ".ID_COLUMN." = ?";

		if ($stmt = static::$mysqli->prepare($query)) {

		    $stmt->bind_param("d", $clear_id);
		     if ($stmt->execute()) {

		    	echo "Succesful ";
		    }
		    else {

		    	exit("Select position error ");
		    }
		    $stmt->bind_result($position);
   			$stmt->fetch();
		    $stmt->close();
		}
		else {
 
			exit("Error prepare getting position ");
		}

		return $position;
	}
}
