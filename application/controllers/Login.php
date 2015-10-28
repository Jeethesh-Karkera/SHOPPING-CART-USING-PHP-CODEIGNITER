<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Login extends CI_Controller {

 public function __construct()
	{
        parent::__construct();
   // Load libraries
		$this->load->database();

		// Load helpers
		$this->load->helper('url');
		 $this->load->helper(array('form'));
		// Load models
		$this->load->model('login_model');
		$this->load->model('pack_model','pkpost');
   
 }

 function index()
 {
   $this->load->helper(array('form'));
  
   
		// Load views
		$this->load->view('header');
		$this->load->view('login_view');
		//$this->load->view('footer');
 }
 
 function register()
 {
	 
   
	
		// Load views
		$data['pack'] = $this->pkpost->getAll();
		$data['error'] = '';
		$this->load->view('header');
		$this->load->view('register_view',$data);
		//$this->load->view('footer');
 }
 
 

 function insert_data()
 {
	 $username = $this->input->post('Name',TRUE);
	 $email_id = $this->input->post('email',TRUE);
	 $password1 = $this->input->post('password',TRUE);
	 $password = MD5($password1);
	 $address = $this->input->post('address',TRUE);
	 $city = $this->input->post('city',TRUE);
	 $district = $this->input->post('district',TRUE);
	 $state = $this->input->post('state',TRUE);
	 $pincode = $this->input->post('pincode',TRUE);
	 $mobile_no = $this->input->post('mobile_no',TRUE);
	 $ref = $this->input->post('ref',TRUE);
	 $pck = $this->input->post('pac_id',TRUE);
	 $ref_no = $this->login_model->ref_no();
	 $pos1 = $this->input->post('pos',TRUE);
	 $gender = $this->input->post('gender',TRUE);
	 $dob = $this->input->post('dob',TRUE);
	 $bname = $this->input->post('bname',TRUE);
	 $branch = $this->input->post('branch',TRUE);
	 $acno = $this->input->post('acno',TRUE);
	 $acname = $this->input->post('acname',TRUE);
	 $ifs = $this->input->post('ifs',TRUE);
	 $material = $this->input->post('material',TRUE);
	 $pos = ucfirst($pos1);
	 $sponser = $this->input->post('sref',TRUE);
					$config['upload_path'] = './uploads';
					$config['allowed_types'] = 'gif|jpg|png|jpeg';
					$config['max_size']	= '10000';
					$config['max_width']  = '2000';
					$config['max_height']  = '2000';
				  
					$this->load->library('upload', $config);//load file upload library
				
					if ( !$this->upload->do_upload())//check's error in file uploading
					{
						$data['error'] = $this->upload->display_errors();
						$data['pack'] = $this->pkpost->getAll();
						$this->load->view('header');
						$this->load->view('register_view',$data);
					}
					else
					{
						$data = $this->upload->data();//store's upload data
						$image_path = $data['raw_name'].$data['file_ext'];//store's file name from upload data	 
	
						$data_user = array("username"=>$email_id,"password"=>$password,"email_id"=>$email_id,"designation"=>"customer","created"=>date('Y-m-d H:i:s'));
						$this->db->insert('users', $data_user);
						$user_id=$this->db->insert_id();
	 
						$data_address = array('address' =>$address,'city' => $city,'state' => $state,'pin' =>$pincode,'district'=>$district,'mob_no' => $mobile_no);
						$this->db->insert('address', $data_address);
						$address_id=$this->db->insert_id();
	
						$data_cust = array("address_id"=>$address_id,"user_id"=>$user_id,"name"=>$username,"email_id"=>$email_id,"ref_no"=>$ref_no,"referd_no"=>$ref,"password"=>$password,"pack"=>$pck,"pos"=>$pos,"sponser"=>$sponser,"image"=>"uploads/".$image_path,"gender"=>$gender,"dob"=>$dob,"material"=>$material);
						$this->db->insert('customer', $data_cust);
						$cid = $this->db->insert_id();
						
						$data_bank = array("cust_id"=>$cid,"bname"=>$bname,"branch"=>$branch,"acno"=>$acno,"acname"=>$acname,"ifs"=>$ifs);
						$this->db->insert('cust_bank', $data_bank);
						
						$data_pay = array("cust_id"=>$cid,"L"=>0,"R"=>0,"Total"=>0);
						$this->db->insert('payout',$data_pay);
	
						$data_pv = array("cust_id"=>$cid,"Total"=>0);
						$this->db->insert('pv',$data_pv);
						$a = $ref;
						$b = 'CR';
						//if (strpos($a, $b) !== false) {
						//$this->login_model->comp_ref($cid,$pck);
					//	} 
						//else
						//{
							$this->login_model->update_pv($cid,$ref,$pck);
							$this->login_model->update_po($ref,$pos,$pck,$sponser);
		
						//}
						redirect('login');
				}
 }
 
}
?>

