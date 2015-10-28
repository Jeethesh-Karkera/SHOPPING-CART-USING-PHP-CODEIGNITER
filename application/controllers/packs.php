<?php
class packs extends CI_Controller {

 function __construct()
 {
   parent::__construct();
     // Load helpers
   $this->load->helper('language');
   $this->load->helper(array('form', 'url'));
   
   // Load Models
	$this->load->model('pack_model', 'cpost');
	$this->load->model('login_model', 'login');

 }
 
 public function index()
 {
		$session_data = $this->session->userdata('logged_in');
		$data['username'] = $session_data['username'];
		$data['cat_list'] = $this->cpost->getAll();
		//$this->load->view('admin/header', $data);
		$this->load->view('admin/pack_view',$data);
		$this->load->view('admin/footer', $data);
 }
 
 public function packadd()
 {
		$session_data = $this->session->userdata('logged_in');
		$data['username'] = $session_data['username'];
		$data['name'] = null;
		$data['amount'] = null;
		$data['pv'] = null;
		$data['po'] = null;
		$data['bi'] = null;
		$data['type'] ='add';
		$data['id'] = 0;
		//$this->load->view('admin/header', $data);
		$this->load->view('admin/pack_add',$data);
	$this->load->view('admin/footer', $data);
 }
 
 public function insert_pack()
 {
	 if($_POST)
	 {
		 $name = $this->input->post('name',TRUE);
		 $amount = $this->input->post('amount',TRUE);
		 $pv = $this->input->post('pv',TRUE);
		 $id = $this->input->post('id',TRUE);
		 $po = $this->input->post('po',TRUE);
		 $bi = $this->input->post('bi',TRUE);
		 $type = $this->input->post('type',TRUE);
		 if($type == 'add')
		 {
			 $data = array("pack_name"=>$name,"amount"=>$amount,"pv"=>$pv,"payout"=>$po,"binary"=>$bi);
			 $this->db->insert('pack',$data);
		 }
		 else
		 {
			 $this->db->set('pack_name',$name);
			 $this->db->set('amount',$amount);
			 $this->db->set('pv',$pv);
			 $this->db->set('payout',$po);
			 $this->db->set('binary',$bi);
			 $this->db->where('pack_id',$id);
			 $this->db->update('pack');
		 }
		  redirect('packs');
	 }
	
 }
 
 public function packupdate()
 {
		$id = $this->uri->segment(3);
		$session_data = $this->session->userdata('logged_in');
		$data['username'] = $session_data['username'];
		$pck_det = $this->cpost->edit($id);
		$data['name'] = $pck_det->pack_name;
		$data['amount'] = $pck_det->amount;
		$data['pv'] = $pck_det->pv;
		$data['po'] = $pck_det->payout;
		$data['bi'] = $pck_det->binary;
		$data['type'] ='update';
		$data['id'] = $id;
		//$this->load->view('admin/header', $data);
		$this->load->view('admin/pack_add',$data);
		$this->load->view('admin/footer', $data);
 }
 
 public function packdelete()
 {
		$id = $this->uri->segment(3);
		$session_data = $this->session->userdata('logged_in');
		$data['username'] = $session_data['username'];
		$this->cpost->delete($id);
		redirect('packs');
 }
 }
 ?>