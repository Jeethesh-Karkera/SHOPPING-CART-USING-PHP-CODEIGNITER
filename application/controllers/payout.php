<?php
class payout extends CI_Controller {

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
		$data['pay'] = $this->rpost->payout($data['username']);
		//$this->load->view('admin/header', $data);
		$this->load->view('customer/payout_view',$data);
		$this->load->view('customer/footer', $data);
 }
 
 public function index1()
 {
		$session_data = $this->session->userdata('logged_in');
		$data['username'] = $session_data['username'];
		$data['pv'] = $this->rpost->pv($data['username']);
		//$this->load->view('admin/header', $data);
		$this->load->view('customer/pv_view',$data);
		$this->load->view('customer/footer', $data);
 }
 

 }
 ?>