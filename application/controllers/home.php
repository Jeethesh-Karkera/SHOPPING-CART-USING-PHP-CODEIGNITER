<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
session_start(); //we need to call PHP's session object to access it through CI

class Home extends CI_Controller {

  public function __construct()
	{
        parent::__construct();
   	// Load libraries
		$this->load->database();
		 $this->load->library('form_validation');

		// Load helpers
		$this->load->helper('url');
		$this->load->helper('form');
		
   $this->load->library('session');
   $this->load->model('login_model','login');
   //$this->load->model('employee_model', 'e_post');
	//	$this->load->model('address_model', 'a_post');
		//$this->load->model('settings_model', 's_post');
 }

 function index()
 {

  if($this->session->userdata('logged_in'))
   {
   
		$session_data = $this->session->userdata('logged_in');
		$data['id']=$session_data['id'];
		$data['username'] = $session_data['username'];
		$data['designation'] = $session_data['designation'];
		
			redirect('index','/');		
     
   }
   else
   {  
     //If no session, redirect to login page
     redirect('login', 'refresh');
   }
   
 }
 	/*public function index1()
	{	
	
		// Get data from model
		if($_POST)
		{
		$session_data = $this->session->userdata('logged_in');
		$data['username'] = $session_data['username'];
		$data['designation'] = $session_data['designation'];
		$group_no = $this->input->post('group_no', TRUE);
		$data['al_posts'] =  $this->s_post->getAll();
		$data['modules']=$this->login->getmodules($session_data['designation']);
		// $user_id=$this->uri->segment(3);
		// $data['grp'] = $this->s_post->getByUserId($user_id);
		
			// Load views
		$this->load->view('login_status_view',$data);
		}
	}
	public function index2()
	{	
	
		// Get data from model
		if($_POST)
		{
		$session_data = $this->session->userdata('logged_in');
		$data['username'] = $session_data['username'];
		$data['designation'] = $session_data['designation'];
		$group_no = $this->input->post('group_no', TRUE);
		$data['al_posts'] =  $this->s_post->getAll();
		$data['modules']=$this->login->getmodules($session_data['designation']);
		// $user_id=$this->uri->segment(3);
		// $data['grp'] = $this->s_post->getByUserId($user_id);
		
			// Load views
			
		$this->load->view('changepassword',$data);
		}
	}
	
	   public function changepwd()
 {
  
     $this->load->library('form_validation');
     $this->form_validation->set_rules('opassword','Old Password','trim|xss_clean|callback_change');
    // $this->form_validation->set_rules('npassword','New Password','trim');
    //$this->form_validation->set_rules('cpassword','Confirm Password','trim|matches[npassword]');
	
    if ($this->form_validation->run() == FALSE)
 
    {	
			
		 echo validation_errors();
		 		
		// redirect(base_url().'home/settings','changepassword');
		echo "<script> $('#changepswrd').click();</script>";
		

    }else{
	 
	//echo "<script>$('#changepswrd').click();</script>";
	return true;
	}
  
    }
	
	 public function change() // we will load models here to check with database  
	{
  
 
     $session_data = $this->session->userdata('logged_in');
 
     $query=$this->db->query("select * from users where user_id=".$session_data['id']); 

     foreach ($query->result() as $my_info) {

     $db_password = $my_info->password;
	
     $db_id = $my_info->user_id; 
	 $db_email=$my_info->user_name;
 
 
    }
	if ((md5($this->input->post('opassword',$db_password)) == $db_password) && ($this->input->post('npassword') != '') && ($this->input->post('cpassword')!='') && $this->input->post('npassword') == $this->input->post('cpassword')) { 
 
		$fixed_pw = md5($this->input->post('npassword'));
 
		$update = $this->db->query("Update users SET password='$fixed_pw' WHERE user_id='$db_id'")or die(mysql_error()); 
		$update1 = $this->db->query("Update employee SET password='$fixed_pw' WHERE email_id='$db_email'")or die(mysql_error()); 
		 $this->form_validation->set_message('change', '<script>alert("Password Updated!");</script>');
		return true;
    

    }
	// else if($this->input->post('npassword') != $this->input->post('cpassword'))
	// {
		// $this->form_validation->set_message('change', '<script>alert("New Password and confirm Password does not match!");</script>');

		// return false;
	// }
   else
	{
		$this->form_validation->set_message('change', '<script>alert("Wrong Password!");</script>');
		
		 //$this->session->set_userdata(array('msg'=>' already logged in')); 
		return false;

	}
	}
	public function ajxc()
	{
		//$company_name1=$this->c_post->getname();
		if($_POST)
		{

			$npassd= $this->input->post('npassword', TRUE);			
			$cpassd= $this->input->post('cpassword', TRUE);			
			
			if ($npassd != $cpassd)
			{
			//$data1=$this->au_post->ticket($gid);
			  echo 'confirm password does not match';

			}
			
		}

	}
	public function ajxp()
	{
		//$company_name1=$this->c_post->getname();
		if($_POST)
		{
			 $session_data = $this->session->userdata('logged_in');
 
				$query=$this->db->query("select password from users where user_id=".$session_data['id']); 

		 foreach ($query->result() as $my_info) {

					$db_password = $my_info->password;
		 }
			$opassd= $this->input->post('opassword', TRUE);				
			
			if ((md5($this->input->post('opassword',$db_password)) != $db_password))
			{
			//$data1=$this->au_post->ticket($gid);
			  echo 'wrong old password';

			}
			
		}

	}
 function Alllogout()
 {
	 $CI =& get_instance();
	 $data = array(
             
			 "active" => false
         );
     $CI->db->update("users", $data);
     $CI->session->unset_userdata("id");
	 $this->session->unset_userdata('logged_in');
	 $this->session->unset_userdata('msg');
     session_destroy();
     redirect('login', 'refresh');
 }
 
 public function settings()
	{	
	
		$session_data = $this->session->userdata('logged_in');
		$data['username'] = $session_data['username'];
		$data['designation'] = $session_data['designation'];
		// Get data from model
		// Get id from uri
			$employee_id = $this->uri->segment(3);
		$username = $data['username'] ;
		//echo $username;
			$post = new settings_model();
			//$add = array();
			//$add['addid'] = $this->s_post->getById($employee_id);
            
		// $addid = $post->getmax();
		 // $address_id= $addid->address_id;
		 // $empid = $post->getmaxempid(); 
		 
		  // $employee_id1 = $empid->employee_id;
		$data1 = $this->s_post->getById($username);
		$a=$data1->address_id;
		
		$data['employee_id'] = $data1->employee_id;
		$data['employee_name'] = $data1->employee_name;
		$data['email_id'] = $data1->email_id;
		$data['designation'] = $data1->designation;
		$data['branch_code'] = $data1->branch_code;
		
		$data2 = $this->s_post->getaddress($a);
		$data['address'] = $data2->address;
		$data['city'] = $data2->city;
		$data['district'] = $data2->district;
		$data['state'] = $data2->state;
		$data['pin'] = $data2->pin;
		$data['phone'] = $data2->phone;
		$data['mob'] = $data2->mob;
		
		
		$data['modules']=$this->login->getmodules($session_data['designation']);
		$this->load->model('employee_model');
		$data['data'] = $this->employee_model->get_results();
			
		// Load views
		//$this->load->view('header',$data);
		//$this->load->view('index1',$data);
		$this->load->view('settings', $data);
		//$this->load->view('footer');
	}
	
	public function update()
	{
		$session_data = $this->session->userdata('logged_in');
		$data['username'] = $session_data['username'];
		$data['designation'] = $session_data['designation'];
		// Get data from model
		// Get id from uri
			$employee_id = $this->uri->segment(3);
		$username = $data['username'] ;
		$post = new settings_model();
                $post = $this->s_post->getById($username);
                $address_id= $post->address_id;
		$email_id=$post->email_id;
		if ($_POST) 
		{
			$post = new Address_model();
			$post->address_id= $address_id;
			$post->address= $this->input->post('address', TRUE);
			$post->city = $this->input->post('city', TRUE);
			$post->district = $this->input->post('district', TRUE);
			$post->state = $this->input->post('state', TRUE);
			$post->pin = $this->input->post('pin', TRUE);
			$post->phone = $this->input->post('phone', TRUE);
			$post->mob = $this->input->post('mob', TRUE);
		
			if ($post->save($post)) 
			{
			$post = new settings_model();
                       // $employee_id = $this->uri->segment(3);
                       $post->employee_name = $this->input->post('employee_name', TRUE);
                        $post->employee_id = $employee_id;                                    
                        $post->designation= $this->input->post('designation', TRUE);
                          $post->password= md5($this->input->post('password', TRUE));       
                        $post->branch_code= $this->input->post('branch_code', TRUE);
                        $post->email_id = $this->input->post('email_id', TRUE); 
		        $post->address_id =$address_id;				                              				
			
												
								
			// Save post to database
			if ($post->save($post)) {
			        $this->db->select('user_id');
                $this->db->where('user_name', $email_id);
                $query = $this->db->get('users');
                $a=$query->row();
			   $data = array(
                            'uname' => $this->input->post('employee_name', TRUE),
                           'user_name' => $this->input->post('email_id', TRUE),
                             'designation' => $this->input->post('designation', TRUE),
                             );
                             $this->db->where('user_id', $a->user_id);
			$this->db->update('users', $data);
                                
			redirect(base_url().'settings/', 'settings');
			}	
			
			}
		}
		
		$this->load->helper('form');
		$data['action'] = site_url('home/update/'.$email_id);
		$data['employee_name'] = $post->employee_name;
		$data['designation'] =$post->designation;
		$data['branch_code'] =$post->branch_code;
        $data['email_id'] =$post->email_id;
        $data['password']= md5($post->password);		
		$post = $this->a_post->getById($address_id );
		$data['address'] = $post->address;
		$data['city'] = $post->city;
		$data['district'] = $post->district;
		$data['state'] = $post->state;
		$data['pin'] = $post->pin;
		$data['phone'] = $post->phone;
		$data['mob'] = $post->mob;
             
		$data['type']= 'update';
		$query = $this->db->get('groups');
		$data['designation1'] = $query->result();
		
		$query1 = $this->db->get('branch');
		$data['branch_code1'] = $query1->result();
                
                
		// Load views	
		//$this->load->view('header');
		$this->load->view('settings_update', $data);
		//$this->load->view('footer');
	}
	
	function reset()
 {

 	$id=$this->uri->segment(3);
	//echo $uid;
	
 	//$CI =& get_instance();
 	$data = array(
 			 
 			"active" => false
 	);
 	$this -> db -> where('user_id',$id);
 	$this->db->update("users", $data);
 	$this->session->unset_userdata("user_id");
 	//$this->session->unset_userdata('logged_in');
 	//$this->session->unset_userdata('msg');
 	//session_destroy();
 	//redirect(base_url().'home/settings', 'reset');
	echo "<script>$('#loginstatus').click();</script>";
	return true;
 }*/
 function logout()
 {
 	$id=$this->uri->segment(3);
 	$CI =& get_instance();
 	$data = array(
 			 
 			"active" => false
 	);
 	$CI -> db -> where('user_id',$id);
 	$CI->db->update("users", $data);
 	$CI->session->unset_userdata("user_id");
 	$this->session->unset_userdata('logged_in');
 	$this->session->unset_userdata('msg');
 	session_destroy();
 	redirect('login', 'refresh');
 }
 

}
?>

