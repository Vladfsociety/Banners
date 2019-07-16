<?php

class Model_Deletebanner extends Model
{	

	public function db_delete_banner($id)
	{
		$clear_id = intval($id);	

		$query = "DELETE FROM ".BANNERS_TABLE." WHERE ".ID_COLUMN." = ?";

		if ($stmt = static::$mysqli->prepare($query)) {

		    $stmt->bind_param("d", $clear_id);
		    if ($stmt->execute()) {

		    	echo "Successful ";
		    }
		    else {

				echo "Removal failed ";
				return FALSE;
		    }
		    $stmt->close();
		}
		else {

			echo "Removal preapre failed ";
			return FALSE;
		}

		static::$mysqli->close();			
		
		return TRUE;
	}


	public function db_select_URL($id)
	{
		$clear_id = intval($id);

		$query = "SELECT ".URL_COLUMN." FROM ".BANNERS_TABLE." WHERE ".ID_COLUMN." = ?";

		if ($stmt = static::$mysqli->prepare($query)) {

		    $stmt->bind_param("d", $clear_id);
		    if ($stmt->execute()) {

		    	echo "Successful ";
		    }
		    else {

				exit("Error getting URL ");
		    }
		    $stmt->bind_result($URL);
   			$stmt->fetch();
		    $stmt->close();
		}
		else {

			exit("Error prepare getting URL ");
		}

		return $URL;
	}
}
