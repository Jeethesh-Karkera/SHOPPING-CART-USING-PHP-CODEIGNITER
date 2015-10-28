<?php
class order extends CI_Controller {

 function __construct()
 {
   parent::__construct();
     // Load helpers
   $this->load->helper('language');
   $this->load->helper(array('form', 'url'));
   
   // Load Models
	
	$this->load->model('order_model', 'spost');
	$this->load->model('login_model', 'login');

 }
 
 public function index()
 {
		$session_data = $this->session->userdata('logged_in');
		$data['username'] = $session_data['username'];
		$data['ord_list'] = $this->spost->getAll();
		$this->spost->up_order();
		
		//$this->load->view('admin/header', $data);
		$this->load->view('admin/order_view',$data);
		$this->load->view('admin/footer', $data);
 }
 
 public function orderdetail()
 {
	 $id = $this->uri->segment(3);
	 $data['details'] =  $this->spost->Details($id);
	 $this->load->view('admin/order_details_view',$data);
	 $this->load->view('admin/footer', $data);
 }
 
 public function orderdeliver()
 {
	  $id = $this->uri->segment(3);
	 $data['details'] =  $this->spost->Delivery($id);
	 $this->index();
 }
 
	public function discount()
	{
		if($_POST)
		{
			$id = $this->input->post('id',TRUE);
			$disc = $this->input->post('disc',TRUE);
			$this->spost->disc($id,$disc);
			redirect('order','refresh');
		}
		
	}
}