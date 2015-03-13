<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Payment_dummy extends CI_Controller {

	
	public function __construct()
	{
		parent::__construct();
		$this->load->helper('url');
	}
	// simulates a redirect from the payment platform
	// assumes payment platform CAN return a dynamic value ($token) via post or get
	public function test_ok()
	{
		$args = func_get_args();
		$token = implode('/',$args);
		
		redirect('/app/on_payment/ok/'.$token);
	}
	
	public function test_error($token)
	{
		$args = func_get_args();
		$token = implode('/',$args);
		redirect('/app/on_payment/error/'.$token);
	}
}

/* End of file welcome.php */
/* Location: ./application/controllers/welcome.php */