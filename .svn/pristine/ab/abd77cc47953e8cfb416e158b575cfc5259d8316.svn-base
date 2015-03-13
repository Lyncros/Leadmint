<?php 

class Code_validator_model extends App_model {

	public $fb_app_name = 'CodeValidator';
	public $fb_default_tab_name = 'Leadmint Code Validator';
	
	public $after_payment_ok = '#tab-6';
	public $after_payment_error = '#tab-5';
	
	public $validation_codes = array();
	
	public $versions = array(
		'lite'	=> 30,
		'full'	=> 60
	);
	
	protected $properties = array(
		'app_features'		=> array(
			'default'		=> 'lite'	
		),
		'app_title'		=> array(
			'versions'		=> array('lite','full'),
			'default' => '',
		),
		'app_description'=> array(
			'versions'		=> array('lite','full')
		),
		'app_language'	=> array(
			'versions'		=> array('lite','full')
		),
		'app_wall_title'	=> array(
			'versions'		=> array('lite','full')
		), 
		'app_wall_description'	=> array(
			'versions'		=> array('lite','full')
		),
		'app_timer'	=> array(
			'versions'		=> array('full'),
			'default'		=> false,
		),
		'app_embedded_wall'	=> array(
			'versions'		=> array('full'),
			'default'		=> false,
		),
		'app_avatar'	=> array(
			'versions'		=> array('lite','full'),
			'default'		=> false,
		),
		'app_date_teaser'	=> array(
			'versions'		=> array('lite','full'),
		), 
		'app_date_campaign'	=> array(
			'versions'		=> array('lite','full'),
		), 
		'app_date_close'	=> array(
			'versions'		=> array('lite','full'),
		), 
		'app_date_winners'	=> array(
			'versions'		=> array('lite','full'),
		), 
		'app_timezone'	=> array(
			'versions'		=> array('lite','full'),
			'default'		=> 'UM3',
		),
		'app_user_requirements'	=> array(
			'versions'		=> array('lite','full')
		),
		'app_user_requirements_custom_label'	=> array(
			'versions'		=> array('lite','full')
		),
		'app_rules'	=> array(
			'versions'		=> array('lite','full')
		),
		'app_codes_file'	=> array(
			'versions'		=> array('lite','full')
		),
		'look_no_fan_mode'	=> array(
			'versions'		=> array('lite','full'),
			'default'		=> 'disabled'
		), 
		'look_no_fan_image'	=> array(
			'versions'		=> array('lite','full'),
			'default'		=> false,
		),
		'look_no_fan_html'	=> array(
			'versions'		=> array('lite','full')
		),
		'look_teaser_mode'	=> array(
			'versions'		=> array('lite','full'),
			'default'		=> 'default',
		), 
		'look_teaser_image'	=> array(
			'versions'		=> array('lite','full'),
			'default'		=> false,
		), 
		'look_teaser_html'	=> array(
			'versions'		=> array('lite','full')
		), 
		'look_campaign_mode'	=> array(
			'versions'		=> array('lite','full'),
			'default'		=> 'default',
		), 
		'look_campaign_image'	=> array(
			'versions'		=> array('lite','full'),
			'default'		=> false,
		), 
		'look_campaign_html'	=> array(
			'versions'		=> array('lite','full')
		),
		'look_close_mode'	=> array(
			'versions'		=> array('lite','full'),
			'default'		=> 'default',
		), 
		'look_close_image'	=> array(
			'versions'		=> array('lite','full'),
			'default'		=> false,
		), 
		'look_close_html'	=> array(
			'versions'		=> array('lite','full'),
			'default'		=> 'default',
		),
		'look_winners_mode'	=> array(
			'versions'		=> array('lite','full'),
			'default'		=> 'default',
		), 
		'look_winners_image'	=> array(
			'versions'		=> array('lite','full'),
			'default'		=> false,
		), 
		'look_winners_html'	=> array(
			'versions'		=> array('lite','full')
		), 
		'look_css'	=> array(
			'versions'		=> array('lite','full')
		),
		'fb_agreement'	=> array(
			'versions'		=> array('lite','full')
		),
		'google_analytics' => array(
			'versions'		=> array('full')
		),
		'tab_1_configured' => array(),
		'tab_2_configured' => array(),
		'tab_3_configured' => array(),
		'tab_4_configured' => array(),
		'app_winners_extract_mode' => array(
			'default' 	=> 'ballot',
			'versions'	=> array('lite','full'),
		)		
	);
	
	public $app_extract_winners_modes = array(
		'ballot'
		//'vote', // code validator doesn't handle user's votes
		//'customize' // code validater doesn't handle customize winners yet
	);	
	
	public function __construct()
	{
		parent::__construct();
		
		$this->load->config('apps');
		$config = $this->config->item('code_validator');

		$this->app_id = $config['app_id'];
		$this->fb_app_id = $config['fb_api_id'];
		$this->fb_app_secret = $config['fb_api_secret'];
		
		$this->properties['app_date_teaser']['default'] = strtotime("+1 week");
		$this->properties['app_date_campaign']['default'] = strtotime("+2 week");
		$this->properties['app_date_close']['default'] = strtotime("+4 week");
		$this->properties['app_date_winners']['default'] = strtotime("+5 week");
	}
	
	protected function preprocess($data)
	{
		// CROP IMAGES ???		
		if(array_key_exists('app_date_campaign',$data))
		{
			$data['app_date_campaign'] = strtotime($data['app_date_campaign']);
		}
		
		if(array_key_exists('app_date_close',$data))
		{
			$data['app_date_close'] = strtotime($data['app_date_close']);
		}
		
		if(array_key_exists('app_date_winners',$data))
		{
			$data['app_date_winners'] = strtotime($data['app_date_winners']);
		}		
		
		if(array_key_exists('app_user_requirements',$data))
		{
			$temp = $data['app_user_requirements'];
			is_array($temp) || $temp = array($temp);
			
			$data['app_user_requirements'] = implode(',',$temp);
		}		
		
		if(!empty($_POST['tab_4_configured']) && $_POST['tab_4_configured'] == '1')
		{			
			$this->load->helper('file_helper');
			$codes_file = read_file ( $_FILES ['codes_file'] ['tmp_name'] );
			
			$campaign_id = $_POST['campaign_id'];
			
			if (!$codes_file) {

			} else {
				//Convert String to Array
				$codes = explode (";", $codes_file);	
				
				$codesToAddAndDelete = $this->getCodesToAddAndDelete($codes);
				
				$this->addCodesToCampaign($codesToAddAndDelete[0], $campaign_id);
				
				$this->deleteCodesOfCampaign($codesToAddAndDelete[1], $campaign_id);
				
				//For security reason, all uploaded files are removed
				@unlink($_FILES['codes_file']);
			}
		}
		
		return $data;
	}	
	
	private function getCodesToAddAndDelete($codes)
	{
		$result = array();
		$codesToAdd = array();
		$codesToDelete = array();
		array_push($result,$codesToAdd);
		array_push($result,$codesToDelete);
		
		foreach($codes as $code)
		{
			$trimmedCode = trim($code);
			if(!empty($trimmedCode))
			{
				if($this->startsWith($trimmedCode, '-'))
					array_push($result[1], substr($trimmedCode, 1, strlen($trimmedCode)-1));
				else
					array_push($result[0], $trimmedCode);
			}
		}
		
		return $result;
	}
	
	private function startsWith($haystack, $needle)
	{
		$length = strlen($needle);
		return (substr($haystack, 0, $length) === $needle);
	}

	public function data_after_save($campaign) 
	{ 
		$data_to_view = array();
		$data_to_view['codes'] = $campaign->valid_codes();
			
		return $data_to_view; 
	}
	
	private function deleteCodesOfCampaign($codes, $campaign_id)
	{
		$this->load->model('app/validation_code_model');
		$this->load->model('campaign_model');
		$campaign = new Campaign_model();
		$validation_code_model = new Validation_code_model();
		$codesToDelete = array ();
		
		// Check if campaign exists		
		if ($campaign->by_id($campaign_id))
		{
			// Check for existing codes
			$campaign_codes = $validation_code_model->get_campaign_valid_codes_as_codes_array($campaign_id);
			
			// Gets codes to delete
			if ($campaign_codes)
				$codesToDelete = array_intersect($codes, $campaign_codes);			
			else
				$codesToDelete = array();
			
			// Delete the codes
			$validation_code_model->deleteByCodes($codesToDelete);
		}
		else
		{
			// Error.
		}
	}
	
	private function addCodesToCampaign($codes, $campaign_id)
	{
		$this->load->model('app/validation_code_model');
		$this->load->model('campaign_model');
		$campaign = new Campaign_model();
		$validation_code_model = new Validation_code_model();
		$codesToInsert = array ();
		
		// Check if campaign exists		
		if ($campaign->by_id($campaign_id))
		{
			// Check for existing codes
			$campaign_codes = $validation_code_model->get_campaign_valid_codes_as_codes_array($campaign_id);
			
			// Gets codes to insert
			if ($campaign_codes)
				$codesToInsert = array_diff($codes, $campaign_codes);			
			else
				$codesToInsert = $codes;
			
			// Insert the codes
			foreach ($codesToInsert as $code)
			{
				if(!empty($code))
				{
					$validation_code = new Validation_code_model();
					$validation_code->campaign_id = $campaign_id;
					$validation_code->code = $code;
					$validation_code->save();
				}
			}
		}
		else
		{
			// Error.
		}
	}
	
	protected function extract_campaign_user_data($campaign_id)
	{
		$requirements = explode(',',$this->app_user_requirements->value);
	
		$headers = array();
		$headers[] = lang_line('report_header_facebook_user_id',false);
		$headers[] = lang_line('report_header_screen_name',false);
		foreach($requirements as $requirement)
		{
			if($requirement) {
				$headers[] = $requirement != 'custom' ? lang_line('custom_requirement_header_'.$requirement,false) : $this->app_user_requirements_custom_label->value;
			}			
		}
		$headers[] = lang_line('report_header_participation_code',false);
		$headers[] = lang_line('report_header_participation_date',false);
		
		$this->load->model('user_content_model');
		$user_content = new User_content_model();
		$rs = $user_content->get_campaign_content($campaign_id, 'code_validator');
		
		$ret = array();
		foreach($rs as $content)
		{
			$row = array();
			$unserialized = unserialize($content->content);
			$row[] = $content->facebook_user_id;
			$row[] = $content->name;
			foreach($requirements as $requirement)
			{
				if($requirement && array_key_exists($requirement,$unserialized))
					$row[] = $unserialized[$requirement];
				else if($requirement)
					$row[] = '';
			}
			$row[] = $unserialized['code'];
			$row[] = date(lang_line('m-d-Y',false), strtotime($content->created_at));
			$ret[] = $row;
		}
		
		return array($headers, $ret);		
	}
}	
?>
