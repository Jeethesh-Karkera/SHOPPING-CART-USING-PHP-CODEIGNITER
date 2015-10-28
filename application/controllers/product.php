<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');


class product extends CI_Controller {

  function __construct()
 {
   parent::__construct();
     // Load helpers
   $this->load->helper('language');
   $this->load->helper(array('form', 'url'));
   
   // Load Models
	$this->load->model('product_model', 'ppost');
	$this->load->model('category_model', 'cpost');
	$this->load->model('pack_model', 'pkpost');
	$this->load->model('login_model', 'login');
	$this->load->model('refer_model', 'ref_model');
	$this->load->model('order_model', 'ord_model');
 }
 
//Index function of controller. During Execution this will executes  first
 function index()
 {
   
	$session_data = $this->session->userdata('logged_in');
	$data['username'] = $session_data['username'];
	$data['pposts']=$this->ppost->getAll();
	 //load view with data
	//$this->load->view('staff/header', $data);
    $this->load->view('admin/product_view', $data);
	$this->load->view('admin/footer', $data);
	
 }
  //End of Index
  
   //Function to add product and display the add Product form
  function addproduct()
 {
   
	$session_data = $this->session->userdata('logged_in');
	$data['username'] = $session_data['username'];

	 //intialise form fields
	 $data['id'] = 0;
	 $data['type'] = 'add';
	 $data['code'] = NULL;
	 $data['pname'] = NULL;
	 $data['pdesc'] = NULL;
	 $data['misc'] = NULL;
	 $data['description'] = NULL;
	 $data['selling_price'] = NULL;
	 $data['received_price'] = NULL;
	 $data['pv'] = NULL;
	 $data['image'] = NULL;
	 $data['stock'] = NULL;
	 $data['cat'] = $this->cpost->getAll();
	 $data['pack'] = $this->pkpost->getAll();
	$data['action'] = base_url('product/insert'); 
	 $data['error'] = '';
	 //load view with data
	// $this->load->view('staff/header', $data);
     $this->load->view('admin/product_add', $data);
	 $this->load->view('admin/footer', $data);
   
 }
 //End of addproduct
 
  //Function to Update Product and display the update Product form 
 function productupdate()
 {
   $session_data = $this->session->userdata('logged_in');
	$data['username'] = $session_data['username'];
	
	 $id=$this->uri->segment(3);//takes id from url segment 3
	 $data['action'] = base_url('product/update/'.$id);//update form action initialisation
     $result=$this->ppost->getByIdproduct($id);	 //load the category with id and stores in result 
	 
	 //Initialises form field for the id
		$data['id'] =$id;
		$data['pname'] = $result->pname;
		$data['cat_id1'] = $result->cat_id;
		$data['pak_id1'] = $result->pack_id;
		$data['type'] = 'update';
		$data['code'] = $result->code;
		$data['pdesc'] = $result->description;
		$data['selling_price'] =  $result->selling_price;
		$data['received_price'] = $result->received_price;
		$data['pv'] = $result->pv;
		$data['misc'] = $result->misc;
		$data['image'] = $result->image;
		$data['stock'] = $result->stock;
		$data['cat'] = $this->cpost->getAll();
		$data['pack'] = $this->pkpost->getAll();
		$data['error'] = '';
		$data['typ']='update';
	   
	//load view with data
	// $this->load->view('staff/header', $data);
     $this->load->view('admin/product_add', $data);
	 $this->load->view('admin/footer', $data);
	
 }
  //end of Product update
   function insert()
	{
				
				 if($this->session->userdata('logged_in'))//check session exist or not
				 {
					 $session_data = $this->session->userdata('logged_in');//Check's for session
					
                   
					 //--Store all Form Fields from form input--//
					
					
					$sell_price = $this->input->post('sell', TRUE);
					$rcv_price = $this->input->post('rcv', TRUE);
					$pname = $this->input->post('pname', TRUE);
				    $pdesc = $this->input->post('desc', TRUE);
				    $pck = $this->input->post('pac_id', TRUE);
				    $code = $this->input->post('isbno', TRUE);
					$cat = $this->input->post('cat_id', TRUE);
					$pv = $this->input->post('pv', TRUE);
					$misc = $this->input->post('misc', TRUE);
					$stock = $this->input->post('stock', TRUE);
					$sub_cat = $this->input->post('sub_id', TRUE);
					
					//file or image upload configuration upload path,allowed types etc.. 
					$config['upload_path'] = './images';
					$config['allowed_types'] = 'gif|jpg|png|jpeg';
					$config['max_size']	= '10000';
					$config['max_width']  = '2000';
					$config['max_height']  = '2000';
				  
					$this->load->library('upload', $config);//load file upload library
				
					if ( !$this->upload->do_upload())//check's error in file uploading
					{
						 $data['error'] = $this->upload->display_errors();

							$data['id'] = 0;
							$data['type'] = 'add';
							$data['code'] = NULL;
							$data['pname'] = NULL;
							$data['pdesc'] = NULL;
							$data['description'] = NULL;
							$data['selling_price'] = NULL;
							$data['received_price'] = NULL;
							$data['pv'] = NULL;
							$data['misc'] = NULL;
							$data['image'] = NULL;
							$data['stock'] = NULL;
							$data['cat'] = $this->cpost->getAll();
							$data['pack'] = $this->pkpost->getAll();
							$data['action'] = base_url('product/insert'); 
							$data['error'] = '';
							//load view with data
							// $this->load->view('staff/header', $data);
							$this->load->view('admin/product_add', $data);
							$this->load->view('admin/footer', $data);
					}
					else
					{
						$data = $this->upload->data();//store's upload data
						$image_path = $data['raw_name'].$data['file_ext'];//store's file name from upload data
						//prepare array to insert into table
						 $datac= array(
						  'pname' =>$pname,
						   'image' =>"images/".$image_path,
						   'description' =>$pdesc,
							'cat_id' =>$cat,
							 'pack_id' =>$pck,
							'code' =>$code,
							'selling_price' =>$sell_price,
							'received_price' =>$rcv_price,
							'pv' =>$pv,
							'misc' =>$misc,
							'stock' =>$stock,
							'sub_cat' =>$sub_cat,
						);
					   $this->db->insert('product', $datac);//inser query to insert product
					  
					  $this->session->set_flashdata('product', 'Product Is Added Successfully');
					$session_data = $this->session->userdata('logged_in');
	$data['username'] = $session_data['username'];
	$data['pposts']=$this->ppost->getAll();
	 //load view with data
	
				$data['tot_usr'] = $this->ref_model->count_user();
			$data['tot_ord'] = $this->ord_model->count_order();
			$data['tot_del'] = $this->ord_model->count_delivery();
			return$this->load->view('admin/header',$data);
			 return $this->load->view('admin/product_view', $data);
			   
					}
					}else{
			//If no session, redirect to login page
          redirect('login', 'refresh');
		}
	}
//End of insert function

  function update()
 {
  
	 if($this->session->userdata('logged_in'))//check for sessions
   {   
	   $session_data = $this->session->userdata('logged_in');//Check's for session
       
	           //#file or image upload configuration upload path,allowed types etc..
			    	$config['upload_path'] = './images';
					$config['allowed_types'] = 'gif|jpg|png|jpeg';
					$config['max_size']	= '10000';
					$config['max_width']  = '2000';
					$config['max_height']  = '2000';
				//#
			    $this->load->library('upload', $config);// load's file upload library
				$id=$this->uri->segment(3); // load's file upload library
				
				
					
				$sell_price = $this->input->post('sell', TRUE);
					$rcv_price = $this->input->post('rcv', TRUE);
					$pname = $this->input->post('pname', TRUE);
				    $pdesc = $this->input->post('desc', TRUE);
				    $pck = $this->input->post('pac_id', TRUE);
				    $code = $this->input->post('isbno', TRUE);
					$cat = $this->input->post('cat_id', TRUE);
					$pv = $this->input->post('pv', TRUE);
					$chk = $this->input->post('chk', TRUE);
					$misc = $this->input->post('misc', TRUE);
					$stock = $this->input->post('stock', TRUE);
					$sub_cat = $this->input->post('sub_id', TRUE);
					if($sub_cat == 0)
					{
						$query =  $this->db->query("SELECT `sub_cat` FROM `product` WHERE pid ='".$id."'");
						$res = $query->row();
						$sub_cat = $res->sub_cat;
					}
				
				if($chk =='1')//check's whether image ,file to change
				{ 
				//if chk 1 image change is true executes this code block
				
						if ( ! $this->upload->do_upload())//check for error if yes exicutes this
						{
									 $data['error'] = $this->upload->display_errors();//store's Upload errors

									 $data['action'] = site_url('product/update/'.$id);//Intialise form action
									 $result=$this->ppost->getByIdproduct($id);	
									 //Initialises form field for the id
									 
		$data['id'] =$id;
		$data['pname'] = $result->pname;
		$data['cat_id1'] = $result->cat_id;
		$data['pak_id1'] = $result->pack_id;
		$data['type'] = 'update';
		$data['code'] = $result->code;
		$data['pdesc'] = $result->description;
		$data['misc'] = $result->misc;
		$data['selling_price'] =  $result->selling_price;
		$data['received_price'] = $result->received_price;
		$data['pv'] = $result->pv;
		$data['image'] = $result->image;
		$data['stock'] = $result->stock;
		$data['cat'] = $this->cpost->getAll();
		$data['pack'] = $this->pkpost->getAll();
		$data['error'] = '';
		$data['typ']='update';
	   
	//load view with data
	// $this->load->view('ad/header', $data);
     $this->load->view('admin/product_add', $data);
	 $this->load->view('admin/footer', $data);
						}else{
							//No upload error execution 
									 $data = $this->upload->data();//load data from upload
									 $image_path = $data['raw_name'].$data['file_ext'];//store image name from upload data
									 
									 //prepare array to update
									  $dataup= array(
						  'pname' =>$pname,
						   'image' =>"images/".$image_path,
						   'description' =>$pdesc,
							'cat_id' =>$cat,
							 'pack_id' =>$pck,
							'code' =>$code,
							'selling_price' =>$sell_price,
							'received_price' =>$rcv_price,
							'pv' =>$pv,
							'misc' =>$misc,
							'stock' =>$stock,
							'sub_cat' =>$sub_cat,
						);
										
									 $this->db->where('pid',  $id);
									 $this->db->update('product', $dataup); //update product with id
									$session_data = $this->session->userdata('logged_in');
	$data['username'] = $session_data['username'];
	$data['pposts']=$this->ppost->getAll();
	 //load view with data
	
				$data['tot_usr'] = $this->ref_model->count_user();
			$data['tot_ord'] = $this->ord_model->count_order();
			$data['tot_del'] = $this->ord_model->count_delivery();
			return$this->load->view('admin/header',$data);
			 return $this->load->view('admin/product_view', $data);
						}
				}else{
					//If no Image change, executes this
				  //prepare array to update 
				$dataup= array(
						  'pname' =>$pname,
						   'description' =>$pdesc,
							'cat_id' =>$cat,
							 'pack_id' =>$pck,
							'code' =>$code,
							'selling_price' =>$sell_price,
							'received_price' =>$rcv_price,
							'pv' =>$pv,
							'misc' =>$misc,
							'stock' =>$stock,
							'sub_cat' =>$sub_cat,
						);
						 $this->db->where('pid',  $id);
						 $this->db->update('product', $dataup);//update product with id 
						$session_data = $this->session->userdata('logged_in');
	$data['username'] = $session_data['username'];
	$data['pposts']=$this->ppost->getAll();
	 //load view with data
	
				$data['tot_usr'] = $this->ref_model->count_user();
			$data['tot_ord'] = $this->ord_model->count_order();
			$data['tot_del'] = $this->ord_model->count_delivery();
			return$this->load->view('admin/header',$data);
			 return $this->load->view('admin/product_view', $data);
	//$this->load->view('staff/footer', $data);
				}
     
   }
   else 
   {
     //If no session, redirect to login page
     redirect('login', 'refresh');
   }
 }
 //End Of Update
 
//Delete Product Function
 function productdelete()
 {
		$session_data = $this->session->userdata('logged_in');
		$data['username'] = $session_data['username'];
		$id=$this->uri->segment(3);//takes id from url segment 3
		$this->ppost->delete($id);
		redirect('product');
 }

 public function stock_update()
 {
	 $stock = $this->input->post('stock',TRUE);
	 $id = $this->input->post('id',TRUE);
	 $this->ppost->stock_update($stock,$id);
	 redirect('product');
 }
 
 public function get_sub()
 {
	 $cat_id = $this->input->post('cat_id',TRUE);
	echo $this->ppost->get_sub_cat($cat_id);
 }
}