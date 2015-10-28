<?php

class Index extends CI_Controller
{
	 public function __construct()
	{
        parent::__construct();
		
		// Load libraries
		$this->load->database();

		// Load helpers
		$this->load->helper('url');
		$this->load->helper('form');
		
		// Load models
		
		$this->load->model('login_model', 'login');
		$this->load->model('refer_model', 'ref_model');
		$this->load->model('order_model', 'ord_model');
		
	}
	public function index()
	{	
		if($this->session->userdata('logged_in'))
		{
			 
			$session_data = $this->session->userdata('logged_in');
		$data['id']=$session_data['id'];
		$data['username'] = $session_data['username'];
		$data['designation'] = $session_data['designation'];
		
		// Get data from model
		// Load views
		if($data['designation'] == 'admin')
		{
			$data['tot_usr'] = $this->ref_model->count_user();
			$data['tot_ord'] = $this->ord_model->count_order();
			$data['tot_del'] = $this->ord_model->count_delivery();
			$data['tot_changes'] = $this->ref_model->count_changes();
			$this->load->view('admin/header',$data);
			//$this->load->view('admin/home_view',$data);
			$this->load->view('admin/footer',$data);
		}
		else if($data['designation'] == 'customer')
		{
			//$this->load->view('customer/header',$data);
			//$this->load->view('admin/home_view',$data);
			//$this->load->view('customer/footer',$data);
			redirect('cart/cust');
		}
		else if($data['designation'] == 'staff')
		{
			$this->load->view('staff/header',$data);
			//$this->load->view('admin/home_view',$data);
			$this->load->view('staff/footer',$data);
		}	 
		}
		else
		{
			//If no session, redirect to login page
			redirect('login', 'refresh');
		}
	
		
	
	}
	
	public function logout()
	{
		$this->session->unset_userdata('id');
		$this->session->sess_destroy();
		
	}
	
	public function setting()
	{
		$session_data = $this->session->userdata('logged_in');
		$data['id']=$session_data['id'];
		$data['profile'] = $this->ref_model->profile($data['id']);
		$this->load->view('customer/settings',$data);
	}
	
	public function chkop()
	{
		//$company_name1=$this->c_post->getname();
		if($_POST)
		{
			$session_data = $this->session->userdata('logged_in');
			$id=$session_data['id'];
				$query=$this->db->query("select `password` from `users` where id='".$id."'"); 
				$my_info = $query->row();
				$db_password = $my_info->password;
				$opassd= $this->input->post('opassword', TRUE);				
			
			if ((md5($opassd) != $db_password))
			{
				echo 'wrong old password';
			}
			
		}

	}
	
	public function changepwd()
	{
		$session_data = $this->session->userdata('logged_in');
		$id=$session_data['id'];
		$old_pass = $this->input->post('opassword', TRUE);		
		$new_pass = $this->input->post('npassword', TRUE);		
		$con_pass = $this->input->post('cpassword', TRUE);	
		$query=$this->db->query("select `password` from `users` where id='".$id."'"); 
		$my_info = $query->row();
		$db_password = $my_info->password;
		$opassd= $this->input->post('opassword', TRUE);				
		if ((md5($opassd) != $db_password))
		{
			echo '0';
		}
		else
		{
			if($con_pass == $new_pass)
			{
				$newpass = md5($this->input->post('npassword'));
				$this->db->query("Update `users` SET password='".$newpass."' WHERE id='".$id."'"); 
				$this->db->query("Update `customer` SET password='".$newpass."' WHERE user_id='".$id."'"); 
				echo '1';
			}
			else
			{
				echo '0';
			}
		}
	}
	
	public function update()
	{
		$session_data = $this->session->userdata('logged_in');
		$id=$session_data['id'];
		$data['profile'] = $this->ref_model->profile($id);
		$this->load->view('customer/update',$data);
	}
	
	public function profile_update()
	{
		$session_data = $this->session->userdata('logged_in');
		$id=$session_data['id'];
		$add = $this->input->post('add',TRUE);
		$city = $this->input->post('city',TRUE);
		$dis = $this->input->post('dis',TRUE);
		$state = $this->input->post('state',TRUE);
		$pin = $this->input->post('pin',TRUE);
		$desc = $this->input->post('desc',TRUE);
		$data = array("address"=>$add,"city"=>$city,"district"=>$dis,"state"=>$state,"pin"=>$pin);
		$this->ref_model->update_profile($data,$id);
		if($desc != ' ')
		{
			
			$this->ref_model->changes($desc,$id);
		}
		redirect('index/setting');
	}
}
?>