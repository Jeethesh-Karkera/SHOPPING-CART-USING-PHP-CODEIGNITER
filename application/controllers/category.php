<?php
class category extends CI_Controller {

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
		$data['sub_cat_list'] = $this->cpost->getAllSub();
		//$this->load->view('admin/header', $data);
		$this->load->view('admin/category_view',$data);
		$this->load->view('admin/footer', $data);
 }
 
 public function categoryadd()
 {
		$session_data = $this->session->userdata('logged_in');
		$data['username'] = $session_data['username'];
		$data['name'] = null;
		$data['desc'] = null;
		$data['type'] ='add';
		$data['id'] = 0;
		//$this->load->view('admin/header', $data);
		$this->load->view('admin/category_add',$data);
	$this->load->view('admin/footer', $data);
 }
 
 public function insert_cat()
 {
	 if($_POST)
	 {
		 $name = $this->input->post('name',TRUE);
		 $desc = $this->input->post('desc',TRUE);
		 $id = $this->input->post('id',TRUE);
		 $type = $this->input->post('type',TRUE);
		 if($type == 'add')
		 {
			 $data = array("Name"=>$name,"Description"=>$desc);
			 $this->db->insert('category',$data);
		 }
		 else
		 {
			 $this->db->set('Name',$name);
			 $this->db->set('Description',$desc);
			 $this->db->where('id',$id);
			 $this->db->update('category');
		 }
		  redirect('category');
	 }
	
 }
 
 public function categoryupdate()
 {
		$id = $this->uri->segment(3);
		$session_data = $this->session->userdata('logged_in');
		$data['username'] = $session_data['username'];
		$cat_det = $this->cpost->edit($id);
		$data['name'] = $cat_det->Name;
		$data['desc'] = $cat_det->Description;
		$data['type'] ='update';
		$data['id'] = $id;
		//$this->load->view('admin/header', $data);
		$this->load->view('admin/category_add',$data);
		$this->load->view('admin/footer', $data);
 }
 
 public function categorydelete()
 {
		$id = $this->uri->segment(3);
		$session_data = $this->session->userdata('logged_in');
		$data['username'] = $session_data['username'];
		$this->cpost->delete($id);
		redirect('category');
 }
 
  public function sub_category()
 {
	 $stock = $this->input->post('stock',TRUE);
	 $id = $this->input->post('id',TRUE);
	$data = array("cat_id"=>$id,"sub_cat"=>$stock);
	print_r($data);
	$this->db->insert('sub_category',$data);
	 redirect('category');
 }
 }
 ?>