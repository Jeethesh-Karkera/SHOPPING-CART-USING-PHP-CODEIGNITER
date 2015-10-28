<?php
Class refer_model extends CI_Model
{
	public function getAll($user_name)
	{
		$data = array();
		$get_stf = $this->db->query("SELECT c.`name`,c.`ref_no`,c.`pos` FROM `customer` as c1 INNER JOIN `customer` as c ON c1.`ref_no` = c.`referd_no`  WHERE c1.`email_id`='".$user_name."'");
		$results= $get_stf->result();
		$i=0;
		$j=0;
		foreach($results as $result)
		{
			$i++;
			$data['id'][] = $i;
			$data[$i]['user']= $result->name.'-'.$result->pos;
			$data[$i][$result->name]['ref'] = $result->ref_no;
			$get_sub = $this->db->query("SELECT `name`,`pos` FROM `customer`  WHERE `referd_no`='".$result->ref_no."'");
			$subs= $get_sub->result();
			foreach($subs as $sub)
			{
				//$j++;
				$data[$result->ref_no][] =$sub->name.'-'.$sub->pos;
				//$data[$i][$j]['sub'][$result->ref_no] = $sub->name;
			}
		}
		return $data;
	}
	public function getname($user_name)
	{
		$get_stf = $this->db->query("SELECT `name`,`ref_no` FROM `customer` WHERE `email_id`='".$user_name."'");
		return $get_stf->row();
	}
	
	
	public function user_list()
	{
		$query = $this->db->query("SELECT c.`customer_id`,c.`name`,c.`email_id`,a.`address`,a.`city`,a.`mob_no`,c.`image`,c.`gender`,c.`dob`,c.`ref_no`,c.`referd_no` FROM customer as c INNER JOIN address as a ON c.`address_id` = a.`id`");
		return $query->result();
		
	}
	public function count_user()
	{
		$query = $this->db->query("SELECT count(*) as un FROM `customer` WHERE unseen = 'yes'");
		return $query->row();
	}
	
	public function count_changes()
	{
		$query = $this->db->query("SELECT count(*) as un FROM `changes` WHERE done = 'no'");
		return $query->row();
	}
	
	public function up_user()
	{
		$this->db->query("update `customer` SET unseen = 'no'  WHERE unseen = 'yes'");
		
	}
	
	public function payout($name)
	{
		$query = $this->db->query("SELECT p.`L`,p.`R` FROM `customer` as c INNER JOIN `payout` as p ON c.customer_id=p.cust_id WHERE email_id='".$name."'");
		return $query->row();
	}
	
	public function pv($name)
	{
		$query = $this->db->query("SELECT p.`L`,p.`R`,p.`direct` FROM `customer` as c INNER JOIN `pv` as p ON c.customer_id=p.cust_id WHERE email_id='".$name."'");
		return $query->row();
	}
	
	public function profile($id)
	{
		$query = $this->db->query("SELECT c.`name`,c.`email_id`,a.`address`,a.`city`,a.`state`,a.`pin`,a.`district`,a.`mob_no`,a.`dob`,b.`bname`,b.`branch`,b.`acno`,b.`acname`,b.`ifs` FROM `customer` as c INNER JOIN `address` as a ON c.`address_id` = a.`id` INNER JOIN `cust_bank` as b ON c.`customer_id` = b.`cust_id` ");
		return $query->row();
		
	}
	
	public function update_profile($data,$id)
	{
		$query = $this->db->query("SELECT `address_id` FROM `customer` WHERE user_id='".$id."'");
		$res = $query->row();
		$this->db->where('id',  $res->address_id);
		$this->db->update('address', $data);
	}
	
	public function changes($desc,$id)
	{
		$query = $this->db->query("SELECT `name`,`customer_id` FROM `customer` WHERE user_id='".$id."'");
		$res = $query->row();
		$data = array("cust_id"=>$res->customer_id,"cust_name"=>$res->name,"desc"=>$desc);
		$this->db->insert('changes',$data);
	}
	
	public function get_bank()
	{
		$query = $this->db->query("SELECT * FROM `cust_bank`");
		return $query->result();
	}
	
	public function profile_update($id)
	{
		$query = $this->db->query("SELECT c.`customer_id`,c.`name`,c.`email_id`,c.`ref_no`,c.`referd_no`,a.`address`,a.`city`,a.`state`,a.`pin`,a.`district`,a.`mob_no`,a.`dob`,b.`bname`,b.`branch`,b.`acno`,b.`acname`,b.`ifs` FROM `customer` as c INNER JOIN `address` as a ON c.`address_id` = a.`id` INNER JOIN `cust_bank` as b ON c.`customer_id` = b.`cust_id` ");
		return $query->row();
	}
	
	public function update_profile_admin($id,$data_add,$data_bnk)
	{
		$query = $this->db->query("SELECT `address_id` FROM `customer` WHERE customer_id='".$id."'");
		$res = $query->row();
		$this->db->where('id',  $res->address_id);
		$this->db->update('address', $data_add);
		
		$this->db->where('cust_id',$id);
		$this->db->update('cust_bank', $data_bnk);
	}
	
	public function changes1()
	{
		$query = $this->db->query("SELECT * FROM `changes` WHERE done='no'");
		return $query->result();
	}
	
	public function change_update($id)
	{
		$this->db->query("UPDATE `changes` SET done='yes' WHERE id='".$id."'");
	}
}
?>