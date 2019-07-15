<?php

class Model_Deletebanner extends Model
{	

	public function db_delete_banner($id)
	{	
		$mysqli = Model_Deletebanner::db_connect();

		$query = sprintf("DELETE FROM banners WHERE id = '%u'",	$id);
		if ($mysqli->query($query) !== TRUE) {

			$mysqli->close();	
			echo "Ошибка при удалении из базы";
			return FALSE;
		}
		$mysqli->close();	
		
		return TRUE;
	}


	public function db_select_URL($id)
	{	
		$mysqli = Model_Deletebanner::db_connect();
		
		$query = sprintf("SELECT URL FROM banners WHERE id = '%u'",	$id);
		$result = $mysqli->query($query);
		if (($row = $result->fetch_assoc()) !== null) {

			$URL = $row['URL'];
		}
		else {

			$mysqli->close();	
			echo "Ошибка при получении URL";
			exit();
		}
		$mysqli->close();	

		return $URL;
	}
}
?>	