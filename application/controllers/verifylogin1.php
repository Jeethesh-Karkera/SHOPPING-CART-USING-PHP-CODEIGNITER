<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class VerifyLogin1 extends CI_Controller {

  public function __construct()
	{
        parent::__construct();
   $this->load->model('login_model','',TRUE);
   $this->load->model('cart_model');
		$this->load->model('login_model', 'login');
                $this->load->library('cart');
				$this->load->helper('form');
				$this->load->library('session');
 }

 function index()
 {
   //This method will have the credentials validation
   $this->load->library('form_validation');

   $this->form_validation->set_rules('username', 'Username', 'trim|required|xss_clean');
   $this->form_validation->set_rules('password', 'Password', 'trim|required|xss_clean|callback_check_database');

   if($this->form_validation->run() == FALSE)
   {
	    
     //Field validation failed.  User redirected to login page
   $this->load->view('checkout_view');
	
   }
   else
   {
	   
     //Go to private area
     redirect('cart/check_out', 'refresh');
   }

 }

 function check_database($password)
 {
	   
   //Field validation succeeded.  Validate against database
	$username = $this->input->post('username');
 
	$this -> db -> select('active');
	$this -> db -> from('users');
	$this -> db -> where('username',  $username);
	
	$query = $this -> db -> get();
	$a=$query->row();
	if($a)
   if($a->active=='1')
   {
        $this->session->set_userdata(array('msg'=>''.$username.' already logged in')); 
        //load the login page
        redirect('login', 'refresh');   

   }

   
   //query the database
   $result = $this->login_model->login($username, $password);
   $this->session->set_userdata(array('msg'=>'')); 
	
   if($result)
   {
    	
     $sess_array = array();
     foreach($result as $row)
     {
       $sess_array = array(
         'id' => $row->id,
         'username' => $row->username,
		 'designation'=>$row->designation
		 
       );
	  
       $this->session->set_userdata('logged_in', $sess_array);
     }
	 
     return TRUE;
   }
   else
   {
     $this->form_validation->set_message('check_database', 'Invalid username or password');
	 
     return false;
   }
 }
}
?>
