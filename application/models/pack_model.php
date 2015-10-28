<?php
Class pack_model extends CI_Model
{
	public function getAll()
	{
		$get_cat = $this->db->query("SELECT * FROM `pack` WHERE deleted ='no'");
		return $get_cat->result();
	}
	
	public function edit($id)
	{
		$get_cat = $this->db->query("SELECT * FROM `pack` WHERE pack_id='".$id."'");
		return $get_cat->row();
	}
	
	public function delete($id)
	{
		$this->db->query("UPDATE`pack` SET deleted='yes' WHERE pack_id='".$id."' ");
	}
}
?>