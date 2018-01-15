<?php
class ShowUsersModel extends CI_Model {

public function show_user_model()
	{
		$query = $this->db->query("select * from tbl_users");
		return $query->result_array();
		
	}
}
