<?php

class Model_Deletebanner extends Model
{	

	public function db_delete_banner($id)
	{
		$clear_id = intval($id);	

		if (!$this->in_db($clear_id, BANNERS_TABLE, ID_COLUMN)) {
			return FALSE;
		}

		$query = "DELETE FROM ".BANNERS_TABLE." WHERE ".ID_COLUMN." = ?";

		if ($this->execute_query($query, array($clear_id)) === FALSE) {
			return FALSE;
		}	
		
		return TRUE;
	}


	public function db_select_URL($id)
	{
		$clear_id = intval($id);

		if (!$this->in_db($clear_id, BANNERS_TABLE, ID_COLUMN)) {
			return FALSE;
		}

		$query = "SELECT ".URL_COLUMN." FROM ".BANNERS_TABLE." WHERE ".ID_COLUMN." = ?";

		if (($URL = $this->execute_query($query, array($clear_id), $fetch=TRUE)) === FALSE) {
			return FALSE;
		}

		return $URL;
	}
}
