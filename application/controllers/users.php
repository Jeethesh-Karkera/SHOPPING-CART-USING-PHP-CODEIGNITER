<?php
class users extends CI_Controller {

 function __construct()
 {
   parent::__construct();
     // Load helpers
   $this->load->helper('language');
   $this->load->helper(array('form', 'url'));
   
   // Load Models
	
	$this->load->model('refer_model', 'spost');
	$this->load->model('login_model', 'login');

 }
 
 public function index()
 {
		$session_data = $this->session->userdata('logged_in');
		$data['username'] = $session_data['username'];
		$data['usr_list'] = $this->spost->user_list();
		$data['usr_bank'] = $this->spost->get_bank();
		$this->spost->up_user();
		//$this->load->view('admin/header', $data);
		$this->load->view('admin/user_view',$data);
		$this->load->view('admin/footer', $data);
 }
 
 public function profile_update()
 {
	 $id = $this->uri->segment(3);
	 $data['profile'] = $this->spost->profile_update($id);
	 $this->load->view('admin/profile_update',$data);
 }
 
 public function update_profile()
 {
	 $id = $this->input->post('id',TRUE);
	 $name=$this->input->post('name',TRUE);
	 $add=$this->input->post('add',TRUE);
	 $city=$this->input->post('city',TRUE);
	 $dis=$this->input->post('dis',TRUE);
	 $state=$this->input->post('state',TRUE);
	 $pin=$this->input->post('pin',TRUE);
	 $mob=$this->input->post('mob',TRUE);
	 $dob=$this->input->post('dob',TRUE);
	 $bname=$this->input->post('bname',TRUE);
	 $branch=$this->input->post('branch',TRUE);
	 $acno=$this->input->post('acno',TRUE);
	 $acname=$this->input->post('acname',TRUE);
	 $ifs=$this->input->post('ifs',TRUE);
	 $this->db->query("UPDATE `customer` SET name='".$name."' WHERE customer_id ='".$id."'");
	 $data_add=array("address"=>$add,"city"=>$city,"district"=>$dis,"state"=>$state,"pin"=>$pin,"mob_no"=>$mob,"dob"=>$dob);
	 $data_bnk = array("bname"=>$bname,"branch"=>$branch,"acno"=>$acno,"acname"=>$acname,"ifs"=>$ifs);
	 $this->spost->update_profile_admin($id,$data_add,$data_bnk);
	 redirect('users');
 }
 
 public function changes()
 {
	 $data['changes'] = $this->spost->changes1();
	 $this->load->view('admin/changes',$data);
 }
 
 function changeupdate()
 {
		$id=$this->uri->segment(3);//takes id from url segment 3
		$this->spost->change_update($id);
		
 }
 }
 ?>