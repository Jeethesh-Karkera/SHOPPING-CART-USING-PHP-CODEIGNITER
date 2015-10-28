<?php
class staff extends CI_Controller {

 function __construct()
 {
   parent::__construct();
     // Load helpers
   $this->load->helper('language');
   $this->load->helper(array('form', 'url'));
   
   // Load Models
	
	$this->load->model('staff_model', 'spost');
	$this->load->model('login_model', 'login');

 }
 
 public function index()
 {
		$session_data = $this->session->userdata('logged_in');
		$data['username'] = $session_data['username'];
		$data['stf_list'] = $this->spost->getAll();
		//$this->load->view('admin/header', $data);
		$this->load->view('admin/staff_view',$data);
		$this->load->view('admin/footer', $data);
 }
 
 public function staffadd()
 {
		$session_data = $this->session->userdata('logged_in');
		$data['username'] = $session_data['username'];
		$data['staff_name'] = null;
		$data['user_name'] = null;
		$data['staff_email'] =null;
		$data['password'] =null;
		$data['mobile'] =null;
		$data['address'] =null;
		$data['dob'] =null;
		$data['city'] =null;
		$data['district'] =null;
		$data['state'] =null;
		$data['pincode'] =null;
		$data['type'] ='add';
		$data['id'] = 0;
		//$this->load->view('admin/header', $data);
		$this->load->view('admin/staff_add',$data);
	$this->load->view('admin/footer', $data);
 }
 
 public function insert_staff()
 {
	 
	 
		
			if($_POST)
			{
				$type=$this->input->post('type');
				if($type=='add')
				{
				$staff_name=$this->input->post('staff_name');
				$user_name=$this->input->post('user_name');
				$email_id=$this->input->post('email_id');
				$mobile_no=$this->input->post('mobile_no');
				$address=$this->input->post('address');
				$dob=$this->input->post('dob');
				$city=$this->input->post('city');
				$district=$this->input->post('district');
				$state=$this->input->post('state');
				$pincode=$this->input->post('pincode');
				$password1=$this->input->post('pincode');
				$date = date('Y-m-d H:i:s');
				$password=md5($password1);
				$type=$this->input->post('type');
				
				$data_user=array(
					'username'=>$user_name,
					'email_id' => $email_id,
					'password'=>$password,
					'designation'=>'staff',
					'created'=>$date,
					
				);
				$this->db->insert('users', $data_user);
				$user_id=$this->db->insert_id();
		
				$data_address = array(
					'address' =>$address,
					'city' => $city,
					'state' => $state,
					'pin' =>$pincode,
					'district'=>$district,
					'dob' => $dob,
					'mob_no' => $mobile_no          
				);
				$this->db->insert('address', $data_address);
				$address_id=$this->db->insert_id();
				$data_staff = array(
					'staff_name' =>$staff_name,
					'staff_email' => $email_id,
					'staff_password' => $password,
					'address_id' => $address_id,
					'user_id' =>$user_id
					);
				$this->db->insert('staff', $data_staff);
			
				
				
			}
			else
			{
				$address_id=$this->input->post('password');
				$user_name=$this->input->post('user_name');
				$staff_id=$this->input->post('id');
				$staff_name=$this->input->post('staff_name');
				$email_id=$this->input->post('email_id');
				$mobile_no=$this->input->post('mobile_no');
				$address=$this->input->post('address');
				$dob=$this->input->post('dob');
				$city=$this->input->post('city');
				$district=$this->input->post('district');
				$state=$this->input->post('state');
				$pincode=$this->input->post('pincode');
				
				
				$this->db->set('staff_name',$staff_name);
				$this->db->set('staff_email',$email_id);
				$this->db->where('staff_id',$staff_id);
				$this->db->update('staff');
				
				$this->db->set('address',$address);
				$this->db->set('dob',$dob);
				$this->db->set('city',$city);
				$this->db->set('district',$district);
				$this->db->set('state',$state);
				$this->db->set('pin',$pincode);
				$this->db->set('mob_no',$mobile_no);
				$this->db->where('id',$address_id);
				$this->db->update('address');
				$this->spost->up_user($email_id,$staff_id,$user_name);
			
		}
	
 }
 //redirect('staff');
 }
 
 public function staffupdate()
 {
		$id = $this->uri->segment(3);
		$add_id = $this->uri->segment(4);
		$session_data = $this->session->userdata('logged_in');
		$data['username'] = $session_data['username'];
		$stf_det = $this->spost->edit($id);
		$data['staff_name'] = $stf_det->staff_name;
		$data['user_name'] = $stf_det->username;
		$data['staff_email'] =$stf_det->staff_email;
		$data['mobile'] =$stf_det->mob_no;
		$data['address'] =$stf_det->address;
		$data['dob'] =$stf_det->dob;
		$data['city'] =$stf_det->city;
		$data['district'] =$stf_det->district;
		$data['state'] =$stf_det->state;
		$data['pincode'] =$stf_det->pin;
		$data['type'] ='update';
		$data['id'] = $id;
		$data['add_id'] = $add_id;
		//$this->load->view('admin/header', $data);
		$this->load->view('admin/staff_add',$data);
	$this->load->view('admin/footer', $data);
 }
 
 public function staffdelete()
 {
		$id = $this->uri->segment(3);
		$session_data = $this->session->userdata('logged_in');
		$data['username'] = $session_data['username'];
		$this->spost->delete($id);
		redirect('staff');
 }
 }
 ?>