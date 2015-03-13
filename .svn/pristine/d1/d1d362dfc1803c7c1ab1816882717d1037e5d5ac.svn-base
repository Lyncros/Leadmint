<?php

class MY_Controller extends CI_Controller {

	protected $user = null;
	protected $title = array();
	protected $data = null;
	
	public function __construct()
	{
		parent::__construct();
		
		// define some constants
		if(!defined('ROOTPATH'))
		{
			define('ROOTPATH',str_replace('application/','',APPPATH));
		}
		if(!defined('SUBFOLDER'))
		{
			$fcPath = str_replace("\\","/",FCPATH);
			$subfolder = str_replace($_SERVER['DOCUMENT_ROOT'],'',$fcPath);
			
			define('SUBFOLDER',$subfolder);
		}
		// load common libraries and helpers
		$this->load->helper('leadmint');
		$this->load->helper('URL');
		$this->load->helper('form');
		$this->load->helper('date');

		// try to load the user from the session
		$this->user = $this->load_model('user_model');
		$this->user->load();
		
		$this->data->user = $this->user; // pass user to the template
		
		// load the template
		$this->template = $this->load_library('template');
		
	}
	
	
	// Common function to render pages
	function render($view = '')
	{
		$this->template
			->title( implode(' | ', $this->title) )
			->render($view,$this->data,true);

	}

	// shortcut for instanciating models
	private function load_model($model)
	{
		$this->load->model($model);
		return new $model();
	}
	
	// shortcut for instanciating libraries
	private function load_library($library)
	{
		$this->load->library($library);
		return new $library();
	}
	
	// ajax response standar
	protected function ajax_message($message, $status='error', $data=null)
	{
		echo(json_encode(array('status'=>$status, 'message' => $message, 'data' => $data)));
		die();
	}


}