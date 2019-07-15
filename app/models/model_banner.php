<?php

class Model_Banner extends Model
{
	
	public function db_select_all()
	{	
		$mysqli = Model_Banner::db_connect();

		$result = $mysqli->query("SELECT * FROM banners ORDER by position DESC");

		$data = [];
		$iter = 0;

		while (($row = $result->fetch_assoc()) !== null) {

			$data[$iter] = $row;
			$iter++;
		}

		$mysqli->close();

		return $data;
	}


	public function db_select_all_enabled()
	{	
		$mysqli = Model_Banner::db_connect();
		
		$result = $mysqli->query("SELECT * FROM banners WHERE status = 'Enabled' ORDER by position DESC");

		$data = [];
		$iter = 0;

		while (($row = $result->fetch_assoc()) !== null) {

			$data[$iter] = $row;
			$iter++;
		}
		
		$mysqli->close();

		return $data;
	}
}
?>	