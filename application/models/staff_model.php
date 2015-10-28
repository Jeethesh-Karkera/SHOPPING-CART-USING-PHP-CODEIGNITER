<?php
Class staff_model extends CI_Model
{
	public function getAll()
	{
		$get_stf = $this->db->query("SELECT s.staff_id,s.staff_name,s.staff_email,a.address,a.city,a.state,a.pin,a.mob_no,a.id FROM `staff` as s INNER JOIN `address` as a ON s.address_id = a.id WHERE s.deleted='no'");
		return $get_stf->result();
	}
	
	public function edit($id)
	{
		$get_cat = $this->db->query("SELECT s.staff_name,s.staff_email,a.address,a.city,a.state,a.pin,a.mob_no,a.dob,a.district,u.username FROM `staff` as s INNER JOIN `address` as a ON s.address_id = a.id INNER JOIN `users` as u ON s.user_id = u.id WHERE s.deleted='no' AND  s.staff_id='".$id."'");
		return $get_cat->row();
	}
	
	public function up_user($email_id,$staff_id,$user_name)
	{
		$query = $this->db->query("SELECT `user_id` FROM `staff` WHERE `staff_id`='".$staff_id."'");
		$res = $query->row();
		$this->db->set('username',$user_name);
		$this->db->set('email_id',$email_id);
		$this->db->WHERE('id',$res->user_id);
		$this->db->update('users');
	}
	
	public function delete($id)
	{
		$this->db->query("UPDATE`staff` SET deleted='yes' WHERE staff_id='".$id."' ");
	}
}
?>