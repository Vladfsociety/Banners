<?php

//i; delete from banners; update banners set name=img1

class Model_Editbanner extends Model
{	

	public function db_update_banner($name, $URL, $status, $id)
	{	
		$mysqli = Model_Editbanner::db_connect();

		$query = sprintf("UPDATE banners SET name = '%s', URL = '%s', status = '%s' WHERE id = '%u'",
			$name,
			$URL,
			$status,
			$id
		);
		if ($mysqli->query($query) !== TRUE) {

			$mysqli->close(); 
			echo "Ошибка при записи";
			return FALSE;
		}
		$mysqli->close();	
		
		return TRUE;
	}


	public function db_select_URL($id)
	{	
		$mysqli = Model_Editbanner::db_connect();
		
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