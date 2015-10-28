<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Welcome extends CI_Controller {

	public function __construct()
	{
        parent::__construct();
		$this->load->library('email');
		$this->email->initialize(array(
  'protocol' => 'smtp',
  'smtp_host' => 'smtp.sendgrid.net',
  'smtp_user' => 'sendgridusername',
  'smtp_pass' => 'sendgridpassword',
  'smtp_port' => 465, 
  'crlf' => "\r\n",
  'newline' => "\r\n"
));

	}
	public function index()
	{
		$this->email->from('jeethuk490@gmail.com', 'KARKERA');
		$this->email->to('karkerajeethesh2@gmail.com');
		$this->email->cc('karkerajeethesh2@gmail.com');
		$this->email->bcc('karkerajeethesh2@gmail.com');

		$this->email->subject('TEST EMAIL');
		$this->email->message('Testing the email class.');

		$this->email->send();

		echo $this->email->print_debugger();
	}
}

/* End of file welcome.php */
/* Location: ./application/controllers/welcome.php */