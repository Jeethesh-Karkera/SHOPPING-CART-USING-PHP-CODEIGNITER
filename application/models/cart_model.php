<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

class cart_model extends CI_Model {
    
     // Get all details ehich store in "products" table in database.
        public function get_all()
	{
		$query = $this->db->query("SELECT * FROM `product` WHERE deleted ='no' and stock > 0"); 
		return $query->result_array();
	}
	
	public function get_cat()
	{
		$query = $this->db->query("SELECT `Name`,`id` FROM `category` WHERE deleted ='no' "); 
		return $query->result();
	}
    public function get_all_cal($id)
	{
		$query = $this->db->query("SELECT * FROM `product` WHERE deleted ='no' and stock > 0 and cat_id = '".$id."'"); 
		return $query->result_array();
	}
	
	public function get_all_sub($id)
	{
		$query = $this->db->query("SELECT * FROM `product` WHERE deleted ='no' and stock > 0 and sub_cat = '".$id."'"); 
		return $query->result_array();
	}
    // Insert customer details in "customer" table in database.
	public function insert_customer($data)
	{
		$this->db->insert('customers', $data);
		$id = $this->db->insert_id();
		return (isset($id)) ? $id : FALSE;		
	}
	
        // Insert order date with customer id in "orders" table in database.
	public function insert_order($data)
	{
		$this->db->insert('orders', $data);
		$id = $this->db->insert_id();
		return (isset($id)) ? $id : FALSE;
	}
	
        // Insert ordered product detail in "order_detail" table in database.
	public function insert_order_detail($data)
	{
		$this->db->insert('order_detail', $data);
	}
	
	public function getCust($user,$desg)
	{
		if($desg == "customer")
		{
			$query1 = $this->db->query("SELECT `pack` FROM `customer` WHERE email_id ='".$user."'");
			$res = $query1->row();
			$query = $this->db->query("SELECT * FROM `product` WHERE deleted ='no' AND pack_id ='".$res->pack."' and stock > 0");
			return $query->result_array();
		}
		else
		{
			$query = $this->db->query("SELECT * FROM `product` WHERE deleted ='no' and stock > 0");
			return $query->result_array();
		}
	}
	public function getCustName($user,$desg)
	{
		if($desg == "customer")
		{
			
			$query1 = $this->db->query("SELECT `name` FROM `customer` WHERE email_id ='".$user."'");
			$res = $query1->row();
			return $res->name;
		}
		else if($desg == "staff" )
		{
			$query1 = $this->db->query("SELECT `staff_name` FROM `staff` WHERE staff_email ='".$user."'");
			$res = $query1->row();
			return $res->staff_name;
		}
		else if($desg == "admin" )
		{
			return $res = "Admin";
		}
		
	}
	
	public function user_details($id,$desg)
	{
		
		if($desg == "customer")
		{
			$user = $this->db->query("SELECT c.`name`,c.`email_id`,a.`address`,a.`city`,a.`state`,a.`pin`,a.`mob_no` FROM customer as c INNER JOIN address as a ON c.`address_id` = a.`id` WHERE c.user_id ='".$id."'");
			
			return $user->row();
		}	
		else if($desg == "staff")
		{
			$user = $this->db->query("SELECT c.`staff_name`,c.`staff_email`,a.`address`,a.`city`,a.`state`,a.`pin`,a.`mob_no` FROM customer as c INNER JOIN address as a ON c.`address_id` = a.`id` WHERE c.user_id ='".$id."'");
			return $user->row();
		}
	}
	
	public function order_num()
	{
		$query = $this->db->query("SELECT count(onum) as orn FROM `order` ");
		$res = $query->row();
		$onm = $res->orn + 1;
		if($onm < 10)
		{
			$onm = '000'.$onm;
		}
		if($onm >9 && $onm < 100)
		{
			$onm = '00'.$onm;
		}
		if($onm >99 && $onm < 1000)
		{
			$onm = '0'.$onm;
		}
		return $onm;
	}
	
      public function pack_tot($user,$desg)
	  {
		  if($desg == "customer")
		{
			
			$query1 = $this->db->query("SELECT p.`amount` FROM `customer` as c INNER JOIN pack as p ON c.pack = p.pack_id WHERE email_id ='".$user."'");
			$res = $query1->row();
			return $res->amount;
		}
		
	  }
	  
	  public function guest_pv($oid)
	  {
		  
			$query = $this->db->query("SELECT p.`pv` FROM `order_detail` as o INNER JOIN `product` as p ON o.`productid` = p.`pid` WHERE o.item_id ='".$oid."'");
			$res = $query->row();
			$query_pv = $this->db->query("SELECT `direct` FROM `pv` WHERE cust_id = 1");
			$res_pv = $query_pv->row();
			
			$tot = $res->pv + $res_pv->direct;
		
			$this->db->query("UPDATE `pv` SET `direct`='".$tot."' WHERE cust_id = 1");
			
	  }
	  
	  public function guest_pv1($oid,$user_id)
		{
			$query = $this->db->query("SELECT p.`pv` FROM `order_detail` as o INNER JOIN `product` as p ON o.`productid` = p.`pid` WHERE o.item_id ='".$oid."'");
			$res = $query->row();
			$query_cust = $this->db->query("SELECT `customer_id`,`referd_no` FROM `customer` WHERE `user_id`='".$user_id."'");
			$cst = $query_cust->row();
			$cust1= $cst->customer_id;
			$get_dir = $this->db->query("SELECT `direct` FROM `pv` WHERE `cust_id`='".$cust1."'");
			$cst1 = $get_dir->row();
			$dir_pv = $res->pv + $cst1->direct;
			
			$this->db->query("UPDATE `pv` SET direct ='".$dir_pv."' WHERE cust_id='".$cust1."'");
			$to_oth = ($res->pv * 10)/100;
			$cnt = $this->db->query("SELECT count(*) as cnt FROM `customer`");
			$tot = $cnt->row();
			$ref = $cst->referd_no;
			for($i=0;$i<=$tot->cnt;$i++)
			{
				
				$query_up = $this->db->query("SELECT `customer_id`,`referd_no`,`pos` FROM `customer` WHERE ref_no ='".$ref."'");
				if($query_up->num_rows() > 0)
				{
					$up_cust = $query_up->row();
					$ref = $up_cust->referd_no;
					$pos_val =$up_cust->pos;
					
					$query_chk1 = $this->db->query("SELECT `".$pos_val."` as pos FROM `pv` WHERE cust_id ='".$up_cust->customer_id."'");
					$query_chk = $query_chk1->row();
					$tot_rem = $query_chk->pos;
					$update_val= $tot_rem + $to_oth;
					$query_chk = $this->db->query("UPDATE `pv` SET `".$pos_val."`='".$update_val."' WHERE cust_id ='".$up_cust->customer_id."'");
				}
				else
				{
					break;
				}
			}
		}
		
		  public function get_product($id)
	{
		$query = $this->db->query("SELECT * FROM `product` WHERE pid ='".$id."'");
		return $query->row();
	}
	
	public function update($id,$qty)
	{
		$query = $this->db->query("SELECT stock FROM `product` WHERE pid='".$id."' ");
		$res = $query->row();
		$stk = $res->stock;
		$rem = $stk - $qty;
		$this->db->query("UPDATE `product` SET stock ='".$rem."' WHERE pid='".$id."'");
	}
	
	 public function get_sub_cat()
	{
		$query = $this->db->query("SELECT * FROM `sub_category` ");
		return $query->result();
	}
}