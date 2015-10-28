<?php
class refered extends CI_Controller {

 function __construct()
 {
   parent::__construct();
     // Load helpers
   $this->load->helper('language');
   $this->load->helper(array('form', 'url'));
   
   // Load Models
	$this->load->model('refer_model', 'rpost');
	$this->load->model('login_model', 'login');

 }
 
 public function index()
 {
		$session_data = $this->session->userdata('logged_in');
		$data['username'] = $session_data['username'];
		$data['user_list'] = $this->rpost->getAll($data['username']);
		$data['username'] = $this->rpost->getname($data['username']);
		//$this->load->view('admin/header', $data);
		$this->load->view('customer/refered_view',$data);
		$this->load->view('customer/footer', $data);
 }
 
 
 public function getusr()
 {
		$ref = $this->input->post('ref_no',TRUE);
		$data = $this->rpost->getnameuser($ref);
		echo $data;
 }
 }
 ?>