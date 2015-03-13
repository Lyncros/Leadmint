<?php

class Campaign_model extends MY_Model {

	protected $table = 'campaign';
	protected $fields = array(
		'id'   => array(),
		'title'  => array(
			'rules'  => array('required'),
		),
		'description'  => array(),
		'app_type_id'  => array(
			'rules'  => array('required'),
		),
		'user_id'  => array(
			'rules'  => array('required'),
		),
		'fb_page_id'  => array(),
		'fb_user_id'  => array(),
		'fb_page_title'  => array(),
		'fb_page_description' => array(),
		'fb_page_link' => array(),
		'created_at'  => array(),
		'updated_at' => array(),
		'valid_date' => array(),
		'activation_requested' => array(),
		'active'	=> array(),
		'in_repository' => array(),
	);
	
	public $application = null;
	public $config = null;
	public $data_from_app_model = null;
	
	// creates a new campaign on the db and sets its default configuration
	public function install ($user_id, $app_type_id)
	{
		$this->user_id = $user_id;
		$this->app_type_id = $app_type_id;
		$new_campaign_id = $this->save();
		
		$this->load->model('campaign_configuration_model');
		$this->config = new Campaign_configuration_model();
		
		$this->application = App_model::forge($app_type_id);
		
		$this->config->initialize($new_campaign_id, $this->application->as_array());		
	}
	
	public function initialize()
	{
		$this->load_config();
		$this->forge_app();		
	}
	
	public function is_payed()
	{
		return $this->valid_date == -1 || $this->valid_date >= time(); // MEJORAR PARA QUE TOME EL DIA COMPLETO
	}
	
	public function is_app_installed($campaign_type_id, $fb_page_id)
	{
		$this->where('campaign_type_id',$campaign_type_id)
			->where('fb_page_id', $fb_page_id)
			->order_by('created_at','DESC') // we can have multiple instances
			->limit(1)
			->get_row();
		return $this->id ? true : false;
	}
	
	public function wipe_actives($user_id,$fb_page_id,$app_type_id)
	{
		$q = "update campaign SET active = 0 WHERE user_id=$user_id AND fb_page_id=$fb_page_id AND app_type_id=$app_type_id";
		$this->db->query($q);
	}
	
	public function save_config()
	{
		// check for campaign table data
		if($this->input->post('app_title') OR $this->input->post('app_description'))
		{
			if($this->input->post('app_title')) $this->data->title = $this->input->post('app_title');
			if($this->input->post('app_description')) $this->data->description = $this->input->post('app_description');
			$this->save();
		}
		$this->application->post_hydrate();		
		$this->config->update($this->id, $this->application->posted_data());
		
		$this->data_from_app_model = $this->application->data_after_save($this);
	}
	
	public function copy_campaign()
	{
		if(!$this->id) return false;
		
		$this->ended_at = date('Y-m-d H:i:s');
		$this->save();
		
		$old_campaign_id = $this->id;
		$this->id = null;
		$this->ended_at = null;
		$new_campaign_id = $this->save();
		
		$this->load_related('configuration_model');
		$conf = new Configuration_model();
		$conf->copy_configuration($old_campaign_id, $new_campaign_id);
		return $new_campaign_id;	
	}
	
	public function get_title($campaign_id = null)
	{
		$campaign_id || $campaign_id = $this->id;
		
		$this->load->model('campaign_configuration_model');
		$this->config = new Campaign_configuration_model();
		
		return $this->config->by_campaign_field($campaign_id,'app_title');
	}
	
	public function get_records($get_config = true)
	{
		parent::get_records();
		
		if($get_config)
		{			
			$this->load->model('campaign_configuration_model');
			$config = new Campaign_configuration_model();
			
			$ids = array();
			foreach($this->query_records as $row)
			{
				$ids[] = $row->id;
			}
			
			$config->by_campaign($ids);
			
			$campaign_config = array();
			foreach($config->query_records as $config_item)
			{
				if(! isset($campaign_config[$config_item->campaign_id])) $campaign_config[$config_item->campaign_id] = array();
				$campaign_config[$config_item->campaign_id][$config_item->field_name] = $config_item->field_value;
			}
			
			
			foreach($this->query_records as $row)
			{
				$application = App_model::forge($row->app_type_id);
				
				$application->hydrate($campaign_config[$row->id]);
				$row->application = $application;
			}
		}
	
		return $this->query_records;
	}
	
	public function get_paged($page = 1, $per_page = 50, $get_config = true)
	{
		parent::get_paged($page,$per_page);
		
		if($get_config)
		{
			
			$this->load->model('campaign_configuration_model');
			$config = new Campaign_configuration_model();
			
			$ids = array();
			foreach($this->query_records as $row)
			{
				$ids[] = $row->id;
			}
			
			$config->by_campaign($ids);
			
			$campaign_config = array();
			foreach($config->query_records as $config_item)
			{
				if(! isset($campaign_config[$config_item->campaign_id])) $campaign_config[$config_item->campaign_id] = array();
				$campaign_config[$config_item->campaign_id][$config_item->field_name] = $config_item->field_value;
			}			
			
			foreach($this->query_records as $row)
			{
				$application = App_model::forge($row->app_type_id);
				
				$application->hydrate($campaign_config[$row->id]);
				$row->application = $application;
			}
		}
	
		return $this->query_records;		
	}
	
	public function get_payment_token()
	{
		// make an array with the campaign data
		$array = array($this->id, $this->app_type_id,$this->user_id);
		$json = json_encode($array);
		
		// encrypt 
		$this->load->library('encrypt');
		$token = $this->encrypt->encode($json);
		
		return $token;
	}
	
	public function from_payment_token($token)
	{		
		$this->load->library('encrypt');
		$json = $this->encrypt->decode($token);
		if(!$json) return false;
		
		$array = json_decode($json);
		$this->by_id($array[0]);
		//$this->dump();
		
		// validate other data
		if($this->app_type_id == $array[1] AND $this->user_id == $array[2]) return true;
		
		// not a valid token
		return false;
	}
	
	public function from_facebook_data($app_type_id, $fb_page_id, $load_config = true)
	{
		$this->where('app_type_id',$app_type_id)
			->where('fb_page_id', $fb_page_id)
			->where('active',1)
			->get_row();
		if(!$this->valid()) return false;
		$this->load_config();
	}
	
	public function load_config()
	{
		$this->load->model('campaign_configuration_model');
		$this->config = new Campaign_configuration_model();
		$this->config->by_campaign($this->id);
	}
	
	public function forge_app()
	{
		//print_r($this->config->as_array());
		$this->application = App_model::forge($this->app_type_id);
		$this->application->hydrate($this->config->as_array());		
		//$this->application->dump();
	}
	public function hasPostAvatar()
	{
		return $this->config->item('app_avatar') != '0';
	}
	
	public function media($field, $html = true)
	{		
		$filename = $this->config->item($field);
		
		$pi = pathinfo($filename);
		$ext = strtolower($pi['extension']);
		switch($ext)
		{
			case 'swf':
				$ret = '';
				break;
			default:
				$ret = $html ? img(SUBFOLDER.'user_files/'.$this->id.'/'.$filename) : base_url().SUBFOLDER.'user_files/'.$this->id.'/'.$filename;
		}
		
		return $ret;
	}
	
	public function valid_codes()
	{
		if($this->id)
		{
			$this->load->model('app/validation_code_model');
			$validation_code = new Validation_code_model();
			
			return $validation_code->get_campaign_valid_codes($this->id);
		}
		else
		{
			return array();
		}
	}
	
	public function delete_all()
	{
		//Only procced if id is set		
		if($this->id > 0)
		{
			// Delete files //die($_SERVER['DOCUMENT_ROOT'].'/user_files/'.$this->id); TODO:Chequear esto en el servidor.			
			$this->deleteDirectory($_SERVER['DOCUMENT_ROOT'].'/user_files/'.$this->id);
			
			// Delete user content
			$this->load->model('user_content_model');
			$content = new User_content_model();
			$content->delete_all_by_campaign_id($this->id);
			
			// Delete campaign validation codes
			$this->load->model('app/validation_code_model');
			$codes = new Validation_code_model();
			$codes->delete_all_by_campaign_id($this->id);
			
			// Delete campaign configuration
			$this->load->model('campaign_configuration_model');
			$config = new Campaign_configuration_model();
			$config->delete_all_by_campaign_id($this->id);
			
			// Delete campaing
			$this->delete();
		}
	}

	protected function deleteDirectory($dir) {
		if (!file_exists($dir)) return true;
		if (!is_dir($dir)) return unlink($dir);
		foreach (scandir($dir) as $item) {
			if ($item == '.' || $item == '..') continue;
			if (!$this->deleteDirectory($dir.'/'.$item)) return false;
		}
		return rmdir($dir);
	}
	
}