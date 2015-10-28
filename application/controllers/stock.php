<?php
class stock extends CI_Controller {

 function __construct()
 {
   parent::__construct();
     // Load helpers
   $this->load->helper('language');
   $this->load->helper(array('form', 'url'));
   
   // Load Models
	$this->load->model('category_model', 'cpost');
	$this->load->model('login_model', 'login');

 }
  
  public function index()
	{
		$session_data = $this->session->userdata('logged_in');
		$data['username'] = $session_data['username'];
		$data['cat_list'] = $this->cpost->getAll();
		//$this->load->view('admin/header', $data);
		$this->load->view('admin/category_view',$data);
		$this->load->view('admin/footer', $data);
	}
}
 ?>