<?php 

class Sweepstakes_model extends App_model {

	public $fb_app_name = 'Sweepstakes';
	public $fb_default_tab_name = 'Leadmint Sweepstakes';
	
	public $after_payment_ok = '#tab-5';
	public $after_payment_error = '#tab-4';
	
	public $versions = array(
		'lite'	=> 14.95,
		'full'	=> 99.95
	);
	
	protected $properties = array(
		'app_features'		=> array(
			'default'		=> 'full'	
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
			'versions'		=> array('lite', 'full'),
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
		'look_no_fan_mode'	=> array(
			'versions'		=> array('lite','full'),
			'default'		=> 'disabled'
		), 
		'look_no_fan_image'	=> array(
			'versions'		=> array('lite','full'),
			'default'		=> false,
		),
		'look_no_fan_html'	=> array(
			'versions'		=> array('lite')
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
			'versions'		=> array('lite')
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
			'versions'		=> array('lite')
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
			'versions'		=> array('lite'),
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
			'versions'		=> array('lite')
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
		
		'app_winners_extract_mode' => array(
			'default' 	=> 'ballot',
			'versions'	=> array('lite','full'),
		), 
	);
	
	public $app_extract_winners_modes = array(
		'ballot',
		//'vote', // sweepstakes doesn't handle user's votes
		//'customize' // sweepstakes doesn't handle customize winners yet
	);
	
	
	public function __construct()
	{
		parent::__construct();
		
		$this->load->config('apps');
		$config = $this->config->item('sweepstakes');

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
		
		//print_r($this->properties);
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
		
		//print_r($data);
		
		return $data;
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
				$headers[] = $requirement != 'custom' ? $requirement : $this->app_user_requirements_custom_label->value;
			}
			
		}
		$headers[] = lang_line('report_header_date',false);
		
		$this->load->model('user_content_model');
		$user_content = new User_content_model();
		$rs = $user_content->get_campaign_content($campaign_id, 'sweepstakes');
		
		$ret = array();
		foreach($rs as $content)
		{
			$row = array();
			$unserialized = unserialize($content->content);
			$row[] = $content->facebook_user_id;
			$row[] = $content->name;
			foreach($requirements as $requirement)
			{
				if($requirement) $row[] = $unserialized[$requirement];
			}
			$row[] = date(lang_line('m-d-Y',false), strtotime($content->created_at));
			$ret[] = $row;
		}
		
		return array($headers, $ret);
		
	}
}