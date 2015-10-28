<?php
Class order_model extends CI_Model
{
	public function getAll()
	{
		$data =array();
		
		$ords_det = $this->db->query("SELECT * FROM `order` WHERE delivery ='no'");
		$ords = $ords_det->result();
		foreach($ords as $ord)
		{
			$data['id'][] = $ord->oid;
			$data[$ord->oid]['onum'] = $ord->onum;
			$data[$ord->oid]['desg'] = $ord->designation;
			$data[$ord->oid]['grand_tot'] = $ord->grand_tot;
			$data[$ord->oid]['disc'] = $ord->discount;
			
			$desg = $ord->designation;
			$d_id = $ord->d_id;
			if($desg == 'Guest')
			{
				$gst = $this->db->query("SELECT g.`gname`,g.`gemail`,a.`address`,a.`city`,a.`state`,a.`mob_no`,a.`pin` FROM guest as g INNER JOIN address as a ON g.address_id = a.id WHERE g.gid ='".$d_id."'");
				$gst_res = $gst->row();
				$data[$ord->oid]['name'] = $gst_res->gname;
				$data[$ord->oid]['email'] = $gst_res->gemail;
				$data[$ord->oid]['address'] = $gst_res->address.",<br/>".$gst_res->city.",".$gst_res->state.",<br/>".$gst_res->pin;
				$data[$ord->oid]['mob'] = $gst_res->mob_no;
				
			}
			else if($desg == 'customer')
			{
				$cst = $this->db->query("SELECT g.`name`,g.`email_id`,a.`address`,a.`city`,a.`state`,a.`mob_no`,a.`pin` FROM customer as g INNER JOIN address as a ON g.address_id = a.id WHERE g.user_id ='".$d_id."'");
				$cst_res = $cst->row();
				$data[$ord->oid]['name'] = $cst_res->name;
				$data[$ord->oid]['email'] = $cst_res->email_id;
				$data[$ord->oid]['address'] = $cst_res->address.",<br/>".$cst_res->city.",".$cst_res->state.",<br/>".$cst_res->pin;
				$data[$ord->oid]['mob'] = $cst_res->mob_no;
			}
			else if($desg == 'staff')
			{
				$stf = $this->db->query("SELECT g.`staff_name`,g.`staff_mail`,a.`address`,a.`city`,a.`state`,a.`mob_no`,a.`pin` FROM staff as g INNER JOIN address as a ON g.address_id = a.id WHERE g.user_id ='".$d_id."'");
				$stf_res = $stf->row();
				$data[$ord->oid]['name'] = $stf_res->staff_name;
				$data[$ord->oid]['email'] = $stf_res->staff_mail;
				$data[$ord->oid]['address'] = $stf_res->address.",<br/>".$stf_res->city.",".$stf_res->state.",<br/>".$stf_res->pin;
				$data[$ord->oid]['mob'] = $stf_res->mob_no;
			}
			$order_det = $this->db->query("SELECT o.`product_code`,o.`quantity`,p.`pname` FROM `order_detail` as o INNER JOIN `product` as p ON o.productid = p.pid WHERE oid ='".$ord->oid."'");
			$or_det = $order_det->result();
			$det = null;
			foreach($or_det as $o_det)
			{
				$det.= "cd:".$o_det->product_code." pname:".$o_det->pname." quantity:".$o_det->quantity."<br/>";
			}
			$data[$ord->oid]['ord_det'] = $det;
		}
		
		return $data;
	}
	
	public function details($id)
	{
		$data =array();
		
		$ords_det = $this->db->query("SELECT * FROM `order` WHERE oid ='".$id."'");
		$ord = $ords_det->row();
		
			
			$data['onum'] = $ord->onum;
			$data['desg'] = $ord->designation;
			$data['total'] = $ord->total;
			$data['discount'] = $ord->discount;
			$data['Grand_Total'] = $ord->grand_tot;
			$desg = $ord->designation;
			$d_id = $ord->d_id;
			if($desg == 'Guest')
			{
				$gst = $this->db->query("SELECT g.`gname`,g.`gemail`,a.`address`,a.`city`,a.`state`,a.`mob_no`,a.`pin` FROM guest as g INNER JOIN address as a ON g.address_id = a.id WHERE g.gid ='".$d_id."'");
				$gst_res = $gst->row();
				$data['name'] = $gst_res->gname;
				$data['email'] = $gst_res->gemail;
				$data['address'] = $gst_res->address.",<br/>".$gst_res->city.",".$gst_res->state.",<br/>".$gst_res->pin;
				$data['mob'] = $gst_res->mob_no;
				
			}
			else if($desg == 'customer')
			{
				$cst = $this->db->query("SELECT g.`name`,g.`email_id`,a.`address`,a.`city`,a.`state`,a.`mob_no`,a.`pin` FROM customer as g INNER JOIN address as a ON g.address_id = a.id WHERE g.user_id ='".$d_id."'");
				$cst_res = $cst->row();
				$data['name'] = $cst_res->name;
				$data['email'] = $cst_res->email_id;
				$data['address'] = $cst_res->address.",<br/>".$cst_res->city.",".$cst_res->state.",<br/>".$cst_res->pin;
				$data['mob'] = $cst_res->mob_no;
			}
			else if($desg == 'staff')
			{
				$stf = $this->db->query("SELECT g.`staff_name`,g.`staff_mail`,a.`address`,a.`city`,a.`state`,a.`mob_no`,a.`pin` FROM staff as g INNER JOIN address as a ON g.address_id = a.id WHERE g.user_id ='".$d_id."'");
				$stf_res = $stf->row();
				$data['name'] = $stf_res->staff_name;
				$data['email'] = $stf_res->staff_mail;
				$data['address'] = $stf_res->address.",<br/>".$stf_res->city.",".$stf_res->state.",<br/>".$stf_res->pin;
				$data['mob'] = $stf_res->mob_no;
			}
			$order_det = $this->db->query("SELECT o.`item_id`,o.`price`,o.`product_code`,o.`quantity`,p.`pname`,p.`image` FROM `order_detail` as o INNER JOIN `product` as p ON o.productid = p.pid WHERE oid ='".$ord->oid."'");
			$or_det = $order_det->result();
			$det = null;
			foreach($or_det as $o_det)
			{
				$data['item_id'][] = $o_det->item_id;
				$data['cd'][$o_det->item_id] = $o_det->product_code;
				$data['pname'][$o_det->item_id] = $o_det->pname;
				$data['quantity'][$o_det->item_id] = $o_det->quantity;
				$data['price'][$o_det->item_id] = $o_det->price;
				$data['image'][$o_det->item_id] = $o_det->image;
			}
			
		
		
		return $data;
	}
	
	public function count_order()
	{
		$query = $this->db->query("SELECT count(*) as un FROM `order` WHERE seen = 'no'");
		return $query->row();
	}
	
	public function up_order()
	{
		$this->db->query("update `order` SET seen = 'yes'  WHERE seen = 'no'");
		
	}
	
	public function count_delivery()
	{
		$query = $this->db->query("SELECT count(*) as un FROM `order` WHERE delivery = 'no'");
		return $query->row();
	}
		
	public function Delivery($id)
	{
		$this->db->query("update `order` SET delivery = 'yes'  WHERE delivery = 'no' AND oid ='".$id."'");
	}
	
	public function disc($id,$disc)
	{
		$query = $this->db->query("SELECT `total` FROM `order` WHERE oid ='".$id."'");
		$res =  $query->row();
		$tot = $res->total;
		$discount = $tot - (($tot * $disc)/100);
		
		$this->db->query("UPDATE `order` SET `grand_tot`='".$discount."',`discount`='".$disc."'  WHERE oid ='".$id."'");
	}
}