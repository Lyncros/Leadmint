<?php
class Fbapp extends CI_Controller {
	
	public $app_model = null;
	protected $current_page = null;
	protected $current_user = null;
	protected $current_campaign = null;
	protected $current_version = 'lite';
	protected $features = array(); // defines an array of features available for the current version. Some are available for all application types (embedded wall) and some not (timer?).
	protected $request_parameters = array();
	protected $referrer = null;
	protected $ga_name = null;
	protected $ga_source = null;
	protected $ga_medium = null;
	protected $ga_term = null;
	protected $ga_content = null;
	
	public function __construct()
	{
		parent::__construct();
		$this->load->library('fb');
		$this->load->model('app_model');
		$this->load->helper('leadmint_helper');
		$this->load->helper('url');
		$this->load->helper('form');
		define('DOCROOT',str_replace('system/','', BASEPATH));
		
		if(!defined('SUBFOLDER'))
		{
			$fcPath = str_replace("\\","/",FCPATH);
			$subfolder = str_replace($_SERVER['DOCUMENT_ROOT'],'',rtrim($fcPath,'/'));
			
			$subfolder AND $subfolder .= '/';
			
			define('SUBFOLDER',$subfolder);
		}
		
		// load the application model in the children class
		// then call to initialize
	}
	
	protected function initialize()
	{		
		FB::forge($this->app_model->fb_app_id, $this->app_model->fb_app_secret);
		
		// try to get the info about the page the controller was loaded from
		// first try the request, if empty try the session, if failed die with error
		if( ! $this->get_data_from_request() )
		{
			if(! $this->get_data_from_session() ) {
				die('Unhandled error. Please try reloading the page');
			}
		}
		
		if(!$this->current_user->valid())
		{
			if($uid = $this->input->post('user_id',true)) {
				$this->current_user = FB::user($uid);
			}
		}

		$this->load->model('campaign_model');
		$campaign = new Campaign_model();
		$campaign->from_facebook_data($this->app_model->app_id, $this->current_page->id);

		// if not valid campaign data, die with error
		if( ! $campaign->valid()) die('Invalid campaign data');
		
		// do we have a valid user? save / update to the db;
		// fb user validation is within facebook_user_model
		$this->load->model('facebook_user_model');
		$fb_user = new Facebook_user_model();
		$fb_user->update_from_facebook($this->current_user);
		
		// if we have an app_language, load it
		// else load the default language
		$this->load->library('i18n');
		$default_language = $this->config->item('default_language');
		list($lang, $locale) = $this->i18n->parse($default_language);
		$language = $campaign->config->item('app_language') ?: $lang;
		
		// as we are not using i18n on the facebook app, always load the fallback
		$fallbacks = $this->config->item('language_fallbacks');
		$app_lang = $fallbacks[$language];
		if(!defined('CURRENT_LANGUAGE')) define('CURRENT_LANGUAGE', $app_lang);
 		$this->load->language('app',CURRENT_LANGUAGE);
 		
 		// with the language defined, forge the app
 		$campaign->forge_app();
 		$campaign->application->load_language();
 		$this->current_campaign = $campaign;
 		
 		// define the logic of version features
 		$this->define_features();
	}
	
	public function define_features(){
		$app = $this->current_campaign->application;
		
		$this->current_version = $app->app_features;
		$versions = $app->versions;
		
		// embedded wall
		$min_version = $app->app_embedded_wall->versions[0];
		$this->features['embedded_wall'] = (boolean)($app->app_embedded_wall->value AND ($versions[$min_version] >= $versions[(string)$this->current_version]));
		
		// timer
		$min_version = $app->app_timer->versions[0];
		$this->features['timer'] = (boolean)($app->app_timer->value AND ($versions[$min_version] >= $versions[(string)$this->current_version]));
		
		// analytics
		$min_version = $app->google_analytics->versions[0];
		$this->features['analytics'] = (boolean)($app->google_analytics->value AND ($versions[$min_version] >= $versions[(string)$this->current_version]));
	} 
	
	public function get_view_campaign($mode){} // abstract, must override in child controller!!
	
	public function get_view_no_fan($mode,$content, $comming_from_index = false)
	{
		$data['content'] = $this->get_standard_content($mode,$content,'no_fan');
		$data['comments_view'] = '';
		$data['campaign']  = $this->current_campaign;
		
		$data['analytics'] = $this->get_analytics();
		$this->render('standard_view',$data);
	}
	
	public function get_view_teaser($mode,$content,$comming_from_index = false)
	{
		$data['content']  = $this->get_standard_content($mode,$content,'teaser');
		$data['campaign']  = $this->current_campaign;
				
		$data['analytics'] = $this->get_analytics();
		
		$data['comments_view'] = $this->features['embedded_wall'] ? $this->load->view('common_comments', array('campaign' => $this->current_campaign,'analytics'=>$data['analytics']), true) : '';
		
		$data['timer_view'] = $this->get_countdown_view(false);

		
		$this->render('standard_view',$data);	
	}
	
	public function get_view_close($mode,$content)
	{
		$data['content']  = $this->get_standard_content($mode,$content,'close');
		$data['campaign']  = $this->current_campaign;
		
		$data['analytics'] = $this->get_analytics();
		
		$data['comments_view'] = $this->features['embedded_wall'] ? $this->load->view('common_comments', array('campaign' => $this->current_campaign,'analytics'=>$data['analytics']), true) : '';
		
		$this->render('standard_view',$data);
	}
	
	public function get_view_winners($mode,$content)
	{
		$data['content']  = $this->get_standard_content($mode,$content,'winners');
		$data['campaign']  = $this->current_campaign;
		
		$data['analytics'] = $this->get_analytics();
		
		$data['comments_view'] = $this->features['embedded_wall'] ? $this->load->view('common_comments', array('campaign' => $this->current_campaign,'analytics'=>$data['analytics']), true) : '';
		
		$this->render('standard_view',$data);
	}
	
	
	public function get_standard_content($mode, $content,$status = 'no_fan')
	{
		$this->load->helper('html');
		
		switch($mode)
		{
			case 'html':
				// do nothing, $content is already valid
				$ret = $content;
				break;
			
			case 'image':
				$pi = pathinfo($content);
				$ext = strtolower($pi['extension']);
				switch($ext)
				{
					case 'swf':
						$ret = '';
						break;
					default:
						
						$ret = img('user_files/'.$this->current_campaign->id.'/'.$content);
				}
				
				
				break;
			default:
				$folder = $this->current_campaign->application->type();
				$ret = img('html/img/'.$folder.'/'.$status.'.jpg');
		
		}
		
		return $ret;
		
	}
	
	public function render($view, $data)
	{
		$this->load->helper('file');
		
		$data['request_parameters'] = $this->request_parameters;
		$data['app_css'] = $this->current_campaign->application->type();
		$data['user_style'] = $this->current_campaign->application->look_css->value;
		$data['common_facebook'] = $this->load->view(
					'common_facebook_auth',
					array('facebook_app_id'=>$this->current_campaign->application->fb_app_id), 
					true);
					
		$this->load->view($view,$data);
	}
		
	protected function get_data_from_request()
	{
		$request = FB::signed_request();
		
		if(!$request) return false;
		
		// request must have page and user data
		if(!isset($request['page'])) return false;
		
		$this->current_page = new FBPage ($request['page']);
		
		if( isset($request['user_id']) )
		{
			$this->current_user = FB::user($request['user_id']);
		}
		else
		{
			$this->current_user = new FBUser(array());
		}
		
		// process the url parameters from facebook
		if(isset($request['app_data']))
		{
			// app data parameters must be in this format:   key1:value1|key2:value2
			$app_data = explode('|',$request['app_data']);
			foreach($app_data as $data)
			{
				$kv = explode(':',$data);
				// use the referrer only once, don't save it in the session
				switch ($kv[0]) {
					case 'ref':
						$this->referrer = $kv[1];
						break;
					case 'utm_name':
						$this->ga_name = $kv[1];
						break;
					case 'utm_source':
						$this->ga_source = $kv[1];
						break;
					case 'utm_medium':
						$this->ga_medium = $kv[1];
						break;
					case 'utm_term':
						$this->ga_term = $kv[1];
						break;
					case 'utm_content':
						$this->ga_content = $kv[1];
						break;
					case 2:
						$this->request_parameters[$kv[0]] = $kv[1];
						break;
				}
			}
		}
		
		$this->save_session();
		return true;
	}
	
	protected function get_data_from_session()
	{
		$page_data = $this->session->userdata('fbpage');
		$user_data = $this->session->userdata('fbuser');
		$request_parameters = $this->session->userdata('request_parameters');
		
		if( ! $page_data ) return false;
		
		$this->current_page = new FBPage($page_data);
		$this->current_user = new FBUser($user_data);
		$this->request_parameters = $request_parameters ? unserialize($request_parameters) : array();
		
		return true;
	}
	
	protected function save_session()
	{
		
		$page = $this->current_page->data();
		$user = $this->current_user->data();

		$this->session->set_userdata('fbpage', $page);
		$this->session->set_userdata('fbuser', $user);
		$this->session->set_userdata('request_parameters',serialize($this->request_parameters));

	}
	
	public function save_comment()
	{
		$this->initialize();
		$comment = $this->input->post('comment',true);
		$campaign_id = $this->input->post('campaign_id',true);
		$user_id = $this->input->post('user_id',true);
		
		// user data is already stored in the $current_user variable
		// check anyway for errors
		if( ! $this->current_user->valid() ) $this->ajax_message(lang_line('unknown_user_error',false));
		
		// some tempering with the form hidden values?
		if( $this->current_campaign->id != $campaign_id OR $this->current_user->id != $user_id) $this->ajax_message(lang_line('form_tampering', false));
		
		$this->load->model('user_content_model');
		$content = new User_content_model();
		$content->facebook_user_id = $user_id;
		$content->campaign_id = $campaign_id;
		$content->category = 'comment';
		$content->content = $comment;
		$content->save();
		
		$this->ajax_message($content->id, 'ok');
	}
	
	public function get_comments()
	{
		$campaign_id = $this->input->post('campaign_id',true);
		$this->load->model('user_content_model');
		$content = new User_content_model();
		$records = $content
			->where('campaign_id',$campaign_id)
			->where('category','comment')
			->order_by('created_at','DESC')
			->get_records();
		die(json_encode($records));
	}
	
	public function report_content($content_id)
	{
		$this->load->model('user_content_model');
		$content = new User_content_model();
		$content->by_id($content_id);
		if($content->reported != -1) // -1 = reported, 0 = unreported, 1 = verified
		{
			$content->reported = -1;
			$content->save();
		}		
	}
	
	public function check_participation($campaign_id = null, $user_id = null, $category = null, $limit = null)
	{
		
		$campaign_id = $this->input->post('campaign_id',true);
		$user_id = $this->input->post('user_id',true);
		$category = $this->input->post('category',true);
		$limit = $this->input->post('limit',true);
		
		if( (!$campaign_id) OR (!$user_id) OR (!$category)) $this->ajax_message(lang_line('bad_post_data',false));
		
		$this->load->model('user_content_model');
		$content = new User_content_model();
		$total = $content->where('campaign_id',$campaign_id)
			->where('facebook_user_id',$user_id)
			->where('category',$category)->count();
		
		$limit || $limit = 1;
		if($total >= $limit) $this->ajax_message(lang_line('already_participating',false));
		
		$this->ajax_message(lang_line('can_participate', false), 'ok');
	}	
	
	public function get_countdown_view($on_campaign = false)
	{
		if(!$this->features['timer']) return '';
		
		return $this->load->view('common_countdown', array('campaign' => $this->current_campaign, 'date' => $this->current_campaign->application->status_date, 'on_campaign'=>$on_campaign), true);
	}
	
	public function get_analytics($track_view_page = true)
	{
		if(!$this->features['analytics']) return '';

		$data = array(	'ga_account' 	=> $this->current_campaign->application->google_analytics, 
						'referrer' 		=> $this->referrer,
						'track_view_page' => track_view_page);
						
		return $this->load->view('common_analytics', $data, true);
	}
	
	public function terms($campaign_id)
	{
		$this->load->model('campaign_configuration_model');
		$config = new Campaign_configuration_model();
		$config->where('campaign_id',$campaign_id)
			->where('field_name','app_rules')
			->get_row();
		
		$this->load->view('common_terms', array('config' => $config));
		
	}
	
	// ajax response standard
	protected function ajax_message($message,$status='error')
	{
		echo(json_encode(array('status'=>$status, 'message' => $message)));
		die();
	}
	
}
