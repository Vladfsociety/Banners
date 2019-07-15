<?php

class Model_Createbanner extends Model
{	

	public function db_insert_new_banner($name,	$URL, $status, $position)
	{	
		$mysqli = Model_Createbanner::db_connect();

		$query = sprintf("INSERT INTO banners (name, URL, status, position) VALUES ('%s', '%s', '%s', '%u')",
			$name,
			$URL,
			$status,
			$position
		);
		if ($mysqli->query($query) !== TRUE) {
				
			$mysqli->close();
			echo "Ошибка при вводе данных";
			return FALSE;
		} 
		$mysqli->close();
		
		return TRUE;
	}


	public function db_select_max_position()
	{	
		$mysqli = Model_Createbanner::db_connect();

		$result = $mysqli->query("SELECT (MAX(position)+1) as maximum FROM banners");
		if (($row = $result->fetch_assoc()) !== null) {

			$position = $row['maximum'];
		}
		else {

			echo "Ошибка при получении максимальной позиции";
			exit();
		}
		$mysqli->close();

		return $position;
	}
}
?>	