<?php
Class category_model extends CI_Model
{
	public function getAll()
	{
		$get_cat = $this->db->query("SELECT * FROM `category` WHERE deleted='no'");
		return $get_cat->result();
	}
	
	public function edit($id)
	{
		$get_cat = $this->db->query("SELECT * FROM `category` WHERE id='".$id."'");
		return $get_cat->row();
	}
	
	public function delete($id)
	{
		$this->db->query("UPDATE`category` SET deleted='yes' WHERE id='".$id."' ");
	}
	
	public function getAllSub()
	{
		$get_cat = $this->db->query("SELECT c.`name`,s.`sub_cat` FROM `sub_category` as s INNER JOIN `category` as c ON c.`id` =s.`cat_id` ");
		return $get_cat->result();
	}
}
?>