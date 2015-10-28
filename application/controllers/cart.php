<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

class cart extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		//load model
		$this->load->model('cart_model');
		$this->load->model('login_model', 'login');
		$this->load->model('refer_model', 'ref_model');
		$this->load->model('order_model', 'ord_model');
                $this->load->library('cart');
				$this->load->helper('form');
				$this->load->library('session');
	}

	public function index()
	{	
	if($this->session->userdata('logged_in'))
	{
		$this->cust();
	}
	else
	{
                //Get all data from database
		$data['products'] = $this->cart_model->get_all();
		$data['category'] = $this->cart_model->get_cat();
		$data['sub_cat'] = $this->cart_model->get_sub_cat();
		$data['username1'] = 0;
		
		$this->load->view('cart_view', $data);
	}
	}
	
	public function cust()
	{
		
			$session_data = $this->session->userdata('logged_in');
			$data['username'] = $session_data['username'];
			$data['designation'] = $session_data['designation'];
			
			$user = $this->cart_model->getCustName($data['username'],$data['designation']);
			
			$data['username1'] = $user;
			//$data['products'] = $this->cart_model->getCust($data['username'],$data['designation']);
			$data['products'] = $this->cart_model->get_all();
			$data['category'] = $this->cart_model->get_cat();
			$data['sub_cat'] = $this->cart_model->get_sub_cat();
                //send all product data to "shopping_view", which fetch from database.	
					//$this->load->view('header1',$data);
			$this->load->view('cart_view', $data);
	}
	
	 function add()
	{
              // Set array for send data.
		$insert_data = array(
			'id' => $this->input->post('id'),
			'name' => $this->input->post('name'),
			'price' => $this->input->post('price'),
			'code' => $this->input->post('code'),
			'qty' => 1
		);		

                 // This function add items into cart.
		$this->cart->insert($insert_data);
	     if($this->session->userdata('logged_in'))
		 {
			 $session_data = $this->session->userdata('logged_in');
			$data['username'] = $session_data['username'];
		  echo  $data['username'];
			
			  redirect('cart/cust');
		 
		 }
           else{     // This will show insert data in cart.
			redirect('cart');
	     }
	}
	
		function remove($rowid) {
                    // Check rowid value.
		if ($rowid==="all"){
                       // Destroy data which store in  session.
			$this->cart->destroy();
		}else{
                    // Destroy selected rowid in session.
			$data = array(
				'rowid'   => $rowid,
				'qty'     => 0
			);
                     // Update cart data, after cancle.
			$this->cart->update($data);
		}
		
                 // This will show cancle data in cart.
		$session_data = $this->session->userdata('logged_in');
		  if($session_data)
		  {
			  redirect('cart/cust');
		  }
           else{     // This will show insert data in cart.
			redirect('cart');
	     }
	}
	
	    function update_cart(){
                
                // Recieve post values,calcute them and update
                $cart_info =  $_POST['cart'] ;
 		foreach( $cart_info as $id => $cart)
		{	
                    $rowid = $cart['rowid'];
                    $price = $cart['price'];
                    $amount = $price * $cart['qty'];
                    $qty = $cart['qty'];
                    
                    	$data = array(
				'rowid'   => $rowid,
                                'price'   => $price,
                                'amount' =>  $amount,
				'qty'     => $qty
			);
             
			$this->cart->update($data);
		}
		$session_data = $this->session->userdata('logged_in');
		 $data['username'] = $session_data['username'];
		 
			if($data['username'] != '')
			{
			  redirect('cart/cust');
		  }
           else{     // This will show insert data in cart.
			redirect('cart');
	     }      
	}	
        function billing_view(){
                // Load "billing_view".
		$this->load->view('billing_view');
        }
        
        	public function save_order()
	{
          // This will store all values which inserted  from user.
		
			
			$gid = $this->input->post('gid');
			$total = $this->input->post('tot');
			if($gid == 0)
			{
				$session_data = $this->session->userdata('logged_in');
				$designation = $session_data['designation'];
				$id = $session_data['id'];
			}
			else
			{
				$designation = "Guest";
				$id = $gid;
			}
				
                 // And store user imformation in database.
		
				$onnum = $this->cart_model->order_num();
		$order = array(
			'onum'=>$onnum,
			'odate_time'=>date('d/m/Y H:i:s'),
			'odate'=>date('Y-m-d'),
			'total'=>$total,
			'designation'=>$designation,
			'd_id' =>$id
		);		

		$this->db->insert('order',$order);
		$o_id = $this->db->insert_id();
		if ($cart = $this->cart->contents()):
			foreach ($cart as $item):
				$order_detail = array(
					'oid' 		=> $o_id,
					'productid' 	=> $item['id'],
					'quantity' 		=> $item['qty'],
					'price' 		=> $item['price'],
					'product_code' =>$item['code']
				);		

                            // Insert product imformation with order detail, store in cart also store in database. 
                
		         $this->db->insert('order_detail',$order_detail);
				 $item_id = $this->db->insert_id();
				 $this->cart_model->update($item['id'],$item['qty']);
				 if($designation == "Guest")
				 {
					 $this->cart_model->guest_pv($item_id);
				 }
				 else
				 {
					  $this->cart_model->guest_pv1($item_id,$id);
				 }
				 
			endforeach;
		endif;
	      
                // After storing all imformation in database load "billing_success".
              $this->cart->destroy();
			  echo $gid;
	}
	
	public function profile()
	{
		$session_data = $this->session->userdata('logged_in');
		$data['id']=$session_data['id'];
		$data['username'] = $session_data['username'];
		if($data['username'] == 'admin')
		{
			$data['tot_usr'] = $this->ref_model->count_user();
			$data['tot_ord'] = $this->ord_model->count_order();
			$data['tot_del'] = $this->ord_model->count_delivery();
			$this->load->view('admin/header',$data);
			//$this->load->view('admin/home_view',$data);
			$this->load->view('Admin/footer',$data);
		}
		else
		{
			
		$this->load->view('customer/header',$data);
			//$this->load->view('admin/home_view',$data);
			$this->load->view('customer/footer',$data);
		}
	}
	
	public function logout()
	{
		$this->session->unset_userdata('id');
		$this->session->sess_destroy();
		redirect('cart');
	}
	
	public function check_out()
	{
		if($this->session->userdata('logged_in'))
		{
			$session_data = $this->session->userdata('logged_in');
			$data['id']=$session_data['id'];
			$data['username'] = $session_data['username'];
			$data['designation'] = $session_data['designation'];
			$user = $this->cart_model->user_details($data['id'],$data['designation']);
			
			if($data['designation'] == 'admin')
			{
				$data['name'] = "admin";
				$data['email']= "admin";
				$data['mobile'] = "1234567890";
				$data['address']="Mangalore";
				$data['city'] ="Mangalore";
				$data['state'] = "Karnataka";
				$data['pin'] = "575001";
			}
			else if($data['designation'] == 'staff')
			{
				$data['name'] = $user->staff_name;
				$data['email']= $user->staff_email;
				$data['mobile'] = $user->mob_no;
				$data['address']=$user->address;
				$data['city'] =$user->city;
				$data['state'] =$user->state;
				$data['pin'] = $user->pin;
			}
			else if($data['designation'] == 'customer')
			{
				$data['name'] = $user->name;
				$data['email']= $user->email_id;
				$data['mobile'] = $user->mob_no;
				$data['address']=$user->address;
				$data['city'] =$user->city;
				$data['state'] =$user->state;
				$data['pin'] = $user->pin;
			}
			
				
		}
		else
		{
			$data['id'] = '';
		}
		$data['add'] = 0;
		$this->load->view('checkout_view',$data);
	}
	
	public function register()
	{
		$name = $this->input->post('fname',TRUE);
		$email = $this->input->post('email',TRUE);
		$mob = $this->input->post('mob',TRUE);
		$address = $this->input->post('address',TRUE);
		$city = $this->input->post('city',TRUE);
		$state = $this->input->post('state',TRUE);
		$pin = $this->input->post('pin',TRUE);
		$gid  = 0;
		
			$session_data = $this->session->userdata('logged_in');
			$data['id']=$session_data['id'];
			$data['username'] = $session_data['username'];
			$data['designation'] = $session_data['designation'];
			if($data['designation'] == 'staff')
			{
				$datastf = array("staff_name"=>$name);
				$this->db->where('user_id',  $data['id']);
				$this->db->update('staff', $datastf); 
				//$datausr = array("username"=>$email,"email_id"=>$email);
				//$this->db->where('id',  $data['id']);
				//$this->db->update('users', $datausr);
				$query = $this->db->query("SELECT `address_id` FROM `staff` WHERE user_id ='".$data['id']."'");
				$res = $query->row();
				$dataadd = array("address"=>$address,"city"=>$city,"state"=>$state,"pin"=>$pin,"mob_no"=>$mob);
				$this->db->where('id',  $res->address_id);
				$this->db->update('address', $dataadd);
			}
			if($data['designation'] == 'customer')
			{
				
				$datacust = array("name"=>$name);
				$this->db->where('user_id',  $data['id']);
				$this->db->update('customer', $datacust);
				//$datausrad = array("username"=>$email,"email_id"=>$email);
				//$this->db->where('id',  $data['id']);
				//$this->db->update('users', $datausrad);
				$query = $this->db->query("SELECT `address_id` FROM `customer` WHERE user_id ='".$data['id']."'");
				$res = $query->row();
				$dataadd = array("address"=>$address,"city"=>$city,"state"=>$state,"pin"=>$pin,"mob_no"=>$mob);
				$this->db->where('id',  $res->address_id);
				$this->db->update('address', $dataadd);
			}
			
			
		
		$data['name1'] = $this->input->post('fname',TRUE);
		$data['email1'] = $this->input->post('email',TRUE);
		$data['mob1'] = $this->input->post('mob',TRUE);
		$data['address1'] = $this->input->post('address',TRUE);
		$data['city1'] = $this->input->post('city',TRUE);
		$data['state1'] = $this->input->post('state',TRUE);
		$data['pin1'] = $this->input->post('pin',TRUE);
		$data['add'] = 1;
		$data['gid'] = $gid;
		$this->load->view('checkout_view',$data);
	}
	
	public function register1()
	{
		$name = $this->input->post('fname',TRUE);
		$email = $this->input->post('email',TRUE);
		$mob = $this->input->post('mob',TRUE);
		$address = $this->input->post('address',TRUE);
		$city = $this->input->post('city',TRUE);
		$state = $this->input->post('state',TRUE);
		$pin = $this->input->post('pin',TRUE);
		
		
			$datagst = array("address"=>$address,"city"=>$city,"state"=>$state,"pin"=>$pin,"mob_no"=>$mob);
			$this->db->insert('address',$datagst);
			$address_id=$this->db->insert_id();
			$dataadd = array("address_id"=>$address_id,"gname"=>$name,"gemail"=>$email);
			$this->db->insert('guest',$dataadd);
			$gid=$this->db->insert_id();
		
		$data['name1'] = $this->input->post('fname',TRUE);
		$data['email1'] = $this->input->post('email',TRUE);
		$data['mob1'] = $this->input->post('mob',TRUE);
		$data['address1'] = $this->input->post('address',TRUE);
		$data['city1'] = $this->input->post('city',TRUE);
		$data['state1'] = $this->input->post('state',TRUE);
		$data['pin1'] = $this->input->post('pin',TRUE);
		$data['add'] = 1;
		$data['gid'] = $gid;
		$data['id'] ='';
		$this->load->view('checkout_view',$data);
	}
	
	public function product_view()
	{
		if($this->session->userdata('logged_in'))
	{
			$session_data = $this->session->userdata('logged_in');
			$data['username'] = $session_data['username'];
			$data['designation'] = $session_data['designation'];
			$user = $this->cart_model->getCustName($data['username'],$data['designation']);
			$data['username1'] = $user;
	}
	else
	{
       $data['username1'] = 0;
	}
		$id = $this->input->post('id',TRUE);
		$data['category'] = $this->cart_model->get_cat();
		$data['product'] = $this->cart_model->get_product($id);
		$data['sub_cat'] = $this->cart_model->get_sub_cat();
		$this->load->view('cart_product_view',$data);

	}
	
	public function category()
	{
		$id = $this->uri->segment(3);
		if($this->session->userdata('logged_in'))
		{
			$session_data = $this->session->userdata('logged_in');
			$data['username'] = $session_data['username'];
			$data['designation'] = $session_data['designation'];
			
			$user = $this->cart_model->getCustName($data['username'],$data['designation']);
			
			$data['username1'] = $user;
			//$data['products'] = $this->cart_model->getCust($data['username'],$data['designation']);
			$data['products'] = $this->cart_model->get_all_cal($id);
			$data['category'] = $this->cart_model->get_cat();
			$data['sub_cat'] = $this->cart_model->get_sub_cat();
                //send all product data to "shopping_view", which fetch from database.	
					//$this->load->view('header1',$data);
			
		}
		else
		{
			//Get all data from database
			$data['products'] = $this->cart_model->get_all_cal($id);
			$data['category'] = $this->cart_model->get_cat();
			$data['sub_cat'] = $this->cart_model->get_sub_cat();
			$data['username1'] = 0;
			
			
	}
	$this->load->view('cart_view', $data);
	}
	
	public function about_us()
	{
		if($this->session->userdata('logged_in'))
	{
			$session_data = $this->session->userdata('logged_in');
			$data['username'] = $session_data['username'];
			$data['designation'] = $session_data['designation'];
			
			$user = $this->cart_model->getCustName($data['username'],$data['designation']);
			
			$data['username1'] = $user;
			
	}
	else
	{
      $data['username1'] = 0;
	}
	$data['products'] = $this->cart_model->get_all();
	$data['category'] = $this->cart_model->get_cat();
	$data['sub_cat'] = $this->cart_model->get_sub_cat();
		$this->load->view('about_view',$data);
	}
	
	public function sub_category()
	{
		$id = $this->uri->segment(3);
		if($this->session->userdata('logged_in'))
		{
			$session_data = $this->session->userdata('logged_in');
			$data['username'] = $session_data['username'];
			$data['designation'] = $session_data['designation'];
			
			$user = $this->cart_model->getCustName($data['username'],$data['designation']);
			
			$data['username1'] = $user;
			//$data['products'] = $this->cart_model->getCust($data['username'],$data['designation']);
			$data['products'] = $this->cart_model->get_all_sub($id);
			$data['category'] = $this->cart_model->get_cat();
			$data['sub_cat'] = $this->cart_model->get_sub_cat();
                //send all product data to "shopping_view", which fetch from database.	
					//$this->load->view('header1',$data);
			
		}
		else
		{
			//Get all data from database
			$data['products'] = $this->cart_model->get_all_sub($id);
			$data['category'] = $this->cart_model->get_cat();
			$data['sub_cat'] = $this->cart_model->get_sub_cat();
			$data['username1'] = 0;
			
			
	}
	$this->load->view('cart_view', $data);
	}
}