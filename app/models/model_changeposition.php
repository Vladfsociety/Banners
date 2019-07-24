<?php

class Model_Changeposition extends Model
{	

	public function db_set_position($data)
	{	
		
		$clear_id = intval($data['id']);
		$clear_position = intval($data['position']);
		$clear_change_id = intval($data['change_id']);
		$clear_change_position = intval($data['change_position']);

		if ($clear_position == 0 || $clear_change_position == 0) {
			return FALSE;
		}

		$query = "UPDATE ".BANNERS_TABLE." SET ".POSITION_COLUMN." = ? WHERE ".ID_COLUMN." = ?";
	
		if ($this->execute_query($query, array($clear_change_position, $clear_id)) === FALSE) {
			return FALSE;
		}

		if ($this->execute_query($query, array($clear_position, $clear_change_id)) === FALSE) {
			return FALSE;
		}
		
		return TRUE;
	}

	public function db_select_position($id)
	{
		$clear_id = intval($id);
		
		if (!$this->in_db($clear_id, BANNERS_TABLE, ID_COLUMN)) {
			return FALSE;
		}

		$query = "SELECT ".POSITION_COLUMN." FROM ".BANNERS_TABLE." WHERE ".ID_COLUMN." = ?";

		if (($position = $this->execute_query($query, array($clear_id), $fetch=TRUE)) === FALSE) {
			return FALSE;
		}

		return $position;
	}
}
