<?php

class Model_Banner extends Model
{
	
	public function db_select_all()
	{
		$result = static::$mysqli->query("SELECT * FROM ".BANNERS_TABLE." ORDER by ".POSITION_COLUMN." DESC");

		$data = [];
		$iter = 0;

		while (($row = $result->fetch_assoc()) !== null) {
			$data[$iter] = $row;
			$iter++;
		}

		return $data;
	}


	public function db_select_all_enabled()
	{
		$result = static::$mysqli->query("SELECT * FROM ".BANNERS_TABLE." WHERE ".STATUS_COLUMN." = '".ENABLED."' ORDER by ".POSITION_COLUMN." DESC");

		$data = [];
		$iter = 0;

		while (($row = $result->fetch_assoc()) !== null) {
			$data[$iter] = $row;
			$iter++;
		}

		return $data;
	}
}
