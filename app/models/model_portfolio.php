<?php
class Model_Portfolio extends Model
{
	public function get_data()
	{	
		$mysqli = new mysqli("mysql-base.db", "dev", "devweb", "dev_vladk");
		if ($mysqli->connect_errno) {
			    printf("Не удалось подключиться: %s\n", $mysqli->connect_error);
			    exit();
			}

		$result = $mysqli->query("SELECT * FROM users");
		$data = [];
		$iter = 0;
		while (($row = $result->fetch_assoc()) !== null) {
			$data[$iter] = $row;
			$iter++;
		}
		return $data;
	}
}
?>