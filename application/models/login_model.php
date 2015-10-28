<?php
Class login_model extends CI_Model
{
 function login($username, $password)
 {
   $this -> db -> select('id, username, password, designation');
   $this -> db -> from('users');
   $this -> db -> where('username', $username);
   $this -> db -> where('password', MD5($password));
   $this -> db -> limit(1);

   $query = $this -> db -> get();

   if($query -> num_rows() == 1)
   {
     return $query->result();
   }
   else
   {
     return false;
   }
 }


 
 function get($id){
		$this->load->database();
		   $query = $this->db->get_where('users',array('user_id'=>$id));
		   return $query->row_array();		  
	}
	function getmodules($designation){
		$query = $this->db->get_where('permission', array('designation' => $designation));
		$mid=$query->result();
		
		$array=array();
		foreach ($mid as $row):
		//$array['p_module_id'][$row->module_id]=$row->module_id;
			$query = $this->db->get_where('modules', array('module_id' => $row->module_id));
			$mname=$query->result();
		foreach ($mname as $row1):
			$array['module_name'][]=$row1->module_name;
			$array['module_p'][$row1->module_name]['add']=$row->madd;
			$array['module_p'][$row1->module_name]['view']=$row->mview;
			$array['module_p'][$row1->module_name]['edit']=$row->medit;
			$array['module_p'][$row1->module_name]['delete']=$row->mdelete;
		endforeach;
		endforeach;
		
	return $array;
	}
	
 function general(){
	    
		$data['base']       = $this->config->item('base_url');
		$data['css']        = $this->config->item('css');     
		}
		
	public function ref_no()
		{
			$query = $this->db->query("SELECT count(ref_no)+1 as ref FROM `customer` WHERE ref_no like 'UR-%'");
			$res = $query->row();
			$ref_no = $res->ref;
			if($ref_no < 10)
			{
				$ref_no = '00'.$ref_no;
			}
			if($ref_no >9 && $ref_no < 100)
			{
				$ref_no = '0'.$ref_no;
			}
			return 'UR-'.$ref_no;
		}
		
		public function comp_ref_no()
		{
			$query = $this->db->query("SELECT count(ref_no)+1 as ref FROM `customer` WHERE ref_no like 'CR-%'");
			$res = $query->row();
			$ref_no = $res->ref;
			if($ref_no < 10)
			{
				$ref_no = '00'.$ref_no;
			}
			if($ref_no >9 && $ref_no < 100)
			{
				$ref_no = '0'.$ref_no;
			}
			return 'CR-'.$ref_no;
		}
		
		
		public function comp_ref($cid,$pck)
		{
			$query = $this->db->query("SELECT max(customer_id) as cust FROM `customer` WHERE name ='company'");
			$res = $query->row();
			$query1 = $this->db->query("SELECT ref_no FROM `customer` WHERE customer_id = '".$res->cust."'");
			$res1 = $query1->row();
			$arr = explode("-",$res1->ref_no);
			$next_ref_no = $this->comp_ref_no();
			if($arr[1] % 2 == 0)
			{
				$query2 = $this->db->query("SELECT ref_no FROM `customer` WHERE name ='company' AND pos ='L'");
				$res2 = $query2->row();
				$this->db->query("UPDATE `customer` set referd_no ='".$res2->ref_no."',pos='R' WHERE customer_id ='".$cid."'");
				$data_cust = array("address_id"=>1,"user_id"=>1,"name"=>"company","email_id"=>"company1@gmail.com","ref_no"=>$next_ref_no,"referd_no"=>$res2->ref_no,"password"=>MD5('12345'),"pack"=>1,'pos'=>'L');
				$this->db->insert('customer', $data_cust);
				$this->update_pv($cid,$res2->ref_no,$pck);
				$this->update_po($res2->ref_no,'R',$pck);
			}
			else
			{
				$query2 = $this->db->query("SELECT ref_no,customer_id FROM `customer` WHERE name ='company' AND pos ='R'");
				$res2 = $query2->row();
				$this->db->query("UPDATE customer set referd_no ='".$res2->ref_no."',pos='L' WHERE customer_id ='".$cid."'");
				$data_cust = array("address_id"=>1,"user_id"=>1,"name"=>"company","email_id"=>"company1@gmail.com","ref_no"=>$next_ref_no,"referd_no"=>$res2->ref_no,"password"=>MD5('12345'),"pack"=>1,'pos'=>'R');
				$this->db->insert('customer', $data_cust);
				$this->update_pv($cid,$res2->ref_no,$pck);
				$this->update_po($res2->ref_no,'L',$pck);
			}
		}
		
		public function update_pv($cust1,$ref_no,$pack)
		{
			$query_pack = $this->db->query("SELECT * FROM `pack` WHERE pack_id ='".$pack."'");
			$res = $query_pack->row();
			$this->db->query("UPDATE `pv` SET direct ='".$res->pv."' WHERE cust_id='".$cust1."'");
			$to_oth = ($res->pv * 10)/100;
			$cnt = $this->db->query("SELECT count(*) as cnt FROM `customer`");
			$tot = $cnt->row();
			$ref = $ref_no;
			for($i=0;$i<=$tot->cnt;$i++)
			{
				
				$query_up = $this->db->query("SELECT `customer_id`,`referd_no`,`pos` FROM `customer` WHERE ref_no ='".$ref."'");
				if($query_up->num_rows() > 0)
				{
					$up_cust = $query_up->row();
					$ref = $up_cust->referd_no;
					$pos_val =$up_cust->pos;
					if($pos_val == '' && $up_cust->customer_id == 1)
					{
						$pos_val = 'direct';
					}
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
		
		public function update_po($ref_no,$pos,$pack,$sponser)
		{
			$query_pack = $this->db->query("SELECT * FROM `pack` WHERE pack_id ='".$pack."'");
			$res = $query_pack->row();
			$po = $res->payout;
			$bi = $res->binary;
			if($sponser != 000)
			{
				
				$refernce = $sponser;
				$id = 1;
			}
			else
			{
				$refernce = $ref_no;
				$id =0;
			}
			$query_up = $this->db->query("SELECT `customer_id` FROM `customer` WHERE ref_no ='".$refernce."'");
			$up_cust = $query_up->row();
			
			$query_chk1 = $this->db->query("SELECT `".$pos."` as pos FROM `payout` WHERE cust_id ='".$up_cust->customer_id."' ");
			$query_chk = $query_chk1->row();
			$tot_rem = $query_chk->pos;
			$tot_amt = $po + $tot_rem;
			$this->db->query("UPDATE `payout` SET `".$pos."`='".$tot_amt."' WHERE cust_id ='".$up_cust->customer_id."'");
			
			if($id == 0)
			{
				$chk1 = $this->db->query("SELECT *  FROM `payout` WHERE cust_id ='".$up_cust->customer_id."' ");
				$chk = $chk1->row();
				if($chk->L !=0  && $chk->R !=0)
				{
					$min = min($chk->L,$chk->R);
					$chks1 = $this->db->query("SELECT `binary` FROM `pack` WHERE `payout` ='".$min."' ");
					$chks = $chks1->row();
					$this->db->query("UPDATE `payout` SET `binary`='".$chks->binary."' WHERE cust_id ='".$up_cust->customer_id."'");
				}
			}
			
		}
		
		public function pos($ref)
		{
			$pos_place ='R';
			$chk_pos = $this->db->query("SELECT `pos` FROM `customer` WHERE referd_no ='".$ref."'");
			if($chk_pos->num_rows() > 0)
			{
				$chk_position = $chk_pos->row();
				$position = $chk_position->pos;
				if($position == 'R')
				{
					$pos_place = 'L';
				}
			}
			return $pos_place;
		}
}

?>
