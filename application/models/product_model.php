<?php
Class product_model extends CI_Model
{
	public function getAll()
	{
		$get_stf = $this->db->query("SELECT p.pid,p.code,p.pname,p.description,p.selling_price,p.received_price,p.pv,p.image,p.`stock`,c.Name,pk.pack_name FROM `product` as p INNER JOIN `category` as c ON p.cat_id = c.id INNER JOIN `pack` as pk ON p.pack_id = pk.pack_id WHERE p.deleted='no' ");
		return $get_stf->result();
	}
	public function getByIdproduct($id)
	{
		$get_up = $this->db->query("SELECT * FROM `product` WHERE pid='".$id."'");
		return $get_up->row();
	}
	
	
	public function delete($id)
	{
		$this->db->query("UPDATE `product` SET deleted='yes' WHERE pid='".$id."' ");
	}
	
	public function stock_update($stock,$id)
	{
		$this->db->query('UPDATE `product` SET `stock` ="'.$stock.'" WHERE pid="'.$id.'"');
	}
	
	
	
	public function get_sub_cat($id)
	{
		$data=null;
		$i=0;
		$data= "<div><label>Sub Category</label><td class='col-md-6'><select class='form-control col-xs-6' id='sub_id' name='sub_id' ><option id='' name=''  value='' ></option>";
		
		$cust  = $this->db->query("SELECT * FROM `sub_category` WHERE cat_id ='".$id."'");
		foreach ($cust->result() as $cust_detail)  
		{
		
				$data.= " <option value='$cust_detail->id' name='sub_id'>$cust_detail->sub_cat</option>";
			
		
		}
		$data.= "</select></div>";
		return $data;
	}
}
?>