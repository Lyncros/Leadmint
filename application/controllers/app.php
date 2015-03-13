<?php require_once('front_controller.php'); ?>
<?php 

class App extends Front_controller {

	var $auth_exception = array('install'); // methods to be excluded from authentication
	private $login_redirect = null;
	
	public function __construct()
	{
		parent::__construct();
		
		$this->login_redirect = lang_base_url('/user/login');
		if(!$this->user->logged())
			if(!in_array($this->router->method, $this->auth_exception)) redirect($this->login_redirect);
		
		$this->load->model('campaign_model');
	}
	
	public function install($app_type_id)
	{
		if(! $this->user->valid()) redirect(lang_base_url('user/register/1'));
				
		$campaign = new Campaign_model();
		
		$campaign->install($this->user->id, $app_type_id);
		
		// create campaing media folder
		$this->_check_media_folder($campaign->id);
		
		// user redirect to avoid double installation on refresh and cleaner logic.		
		redirect(lang_base_url('app/config/'.$campaign->id));
	}
	
	public function config($campaign_id)
	{
		$campaign = new Campaign_model();
		$campaign->by_id($campaign_id);
		
		// ALWAYS CONFIRM CAMPAIGN ID REALLY BELONGS TO THE LOGGED USER!!!! 
		// or that the users is super
		if( (!$campaign->valid()) OR ($campaign->user_id != $this->user->id && !$this->user->is_super)) redirect(lang_base_url('user/dashboard'));
		
		$campaign->initialize();
		$campaign->application->load_language();
		$fallbacks = $this->config->item('language_fallbacks');
		$app_lang = $fallbacks[$campaign->application->app_language->value ?: 'es'];
		
		list($language_select, $country_select, $timezone_select) = $this->i18n->get_dropdowns($app_lang);
		$this->data->language_select = $language_select;
		$this->data->country_select = $country_select;

		$this->data->campaign = $campaign;
		$this->data->props = $campaign->application->properties();
		
		$this->template->css('js/jquery-ui-datepicker/default.css');
		$this->template->js('js/jquery-ui-datepicker/jquery-ui-1.8.18.custom.min.js');
		$this->template->js('js/jquery.validate.js');
		$this->template->css('js/timeentry/jquery.timeentry.css');
		$this->template->js('js/timeentry/jquery.timeentry.js');
		//$this->template->css('js/dateentry/jquery.dateentry.css');
		//$this->template->js('js/dateentry/jquery.dateentry.js');
		
		$this->template->js('js/swfobject.js');
		$this->template->css('js/uploadify/uploadify.css');
		$this->template->js('js/uploadify/jquery.uploadify.v2.1.0.min.js');
		$this->template->css('js/jHtmlArea/jHtmlArea.css');
		$this->template->js('js/jHtmlArea/jHtmlArea-0.7.0.min.js');
		
		$this->template->js('js/jquery.form.js');
		
		$this->template->css('css/apps/common.css');		
		
		$data['media'] = $this->_get_campaign_media($campaign->id);
		$data['campaign_id'] = $campaign->id;
		$this->data->common_popups = $this->template->view('app/common_popups',$data,false);
		
		// PAYMENT TAB
		$data['campaign'] = $campaign;
		$this->data->payment_tab = $this->template->view('app/common_payment_tab',$data,false);
		
		// INSTALLATION TAB
		$data['facebook_app_id'] = $campaign->application->fb_app_id;
		$data['default_tab_name'] = $campaign->application->fb_default_tab_name;
		// Facebook user and campaign installation status management
		// if the app is already installed, show data in view mode only
		if($campaign->fb_page_id)
		{
			// retrieve the user data from the local database, so do not delay waiting for facebook
			$this->load->model('facebook_user_model');
			$local_fb_user = new Facebook_user_model();
			$local_fb_user->by_id($campaign->fb_user_id);
			
			$this->load->library('FB');
			FB::forge($campaign->application->fb_app_id,$campaign->application->fb_app_secret);
			$fbpage = FB::page($campaign->fb_page_id);
			
			$data['local_fb_user'] = $local_fb_user;
			$data['fb_page'] =  $fbpage;
			$data['campaign'] = $campaign;			
			
			$this->data->installation_status = $this->template->view('app/common_page_installed',$data,false);
		}
		else
		{
			$this->data->installation_status = $this->template->view('app/common_page_not_installed',$data,false);
		}
				
		// USERS AND WINNERS TAB
		if($campaign->application->app_embedded_wall->value)
		{
			$this->load->model('user_content_model');
			$content = new User_content_model();
			$content->where('reported',-1);
			$data['comments'] = $content->get_campaign_content($campaign->id, 'comment');
			//echo($content->last_query());
		}
		$data['campaign'] = $campaign;
		$data['props'] = $campaign->application->properties();
		$this->data->users_winners_tab = $this->template->view('app/common_user_winners_tab',$data,false);
		
		$this->render('app/'.$campaign->application->type().'_config');
	}
	
	public function save($campaign_id = null)
	{
		$campaign = new Campaign_model();
		$campaign->by_id($campaign_id);		
		
		// ALWAYS CONFIRM CAMPAIGN ID REALLY BELONGS TO THE LOGGED USER!!!!
		if( (!$campaign->valid()) OR $campaign->user_id != $this->user->id) 
		{			
			$this->input->is_ajax_request() ? $this->ajax_message(lang_line('front_error_invalid_campaign',false)) : redirect(lang_base_url('user/dashboard'));
		}
		
		// delegate to the app_model to parse and validate the data;
		$campaign->initialize();		
		//$campaign->application->load_language();
		$campaign->save_config();
		
		$data = array();
		if($campaign->data_from_app_model);
			$data = $campaign->data_from_app_model;
			
		$this->ajax_message(lang_line('app_record_saved',false),'OK', $data); 
	}
	
	/**
	* Veryfy whether this app is already installed on the destination fanpage
	*
	* @param integer $campaign_id id of the current campaign
	* @return $ajax_message Text explainig the camoaign has already been installed on target fanpage or false if not.
	*/
	public function tabcheck($campaign_id = null)
	{
		// only accept ajax requests
		if( ! $this->input->is_ajax_request() ) redirect(lang_base_url('user/dashboard'));
		
		$campaign = new Campaign_model();
		$campaign->by_id($campaign_id);
		
		
		// ALWAYS CONFIRM CAMPAIGN ID REALLY BELONGS TO THE LOGGED USER!!!!
		if( (!$campaign->valid()) OR $campaign->user_id != $this->user->id) 
		{
			$this->input->is_ajax_request() ? $this->ajax_message(lang_line('front_error_invalid_campaign',false)) : redirect(lang_base_url('user/dashboard'));
		}
		$campaign->initialize();
		
		$fb_page_id = $this->input->post('fb_page_id',true);
		
		$check = new Campaign_model();
		$check->where('fb_page_id',$fb_page_id)
			->where('app_type_id',$campaign->app_type_id)
			->get_row();
		
		if($check->valid()) $this->ajax_message(lang_line('app_already_installed_on_fan_page',false));
		
		$this->ajax_message(lang_line('app_tab_available', false),'OK'); 
	}
	
	public function tabinstall($campaign_id = null)
	{
		// only accept ajax requests
		if( ! $this->input->is_ajax_request() ) redirect(lang_base_url('user/dashboard'));
		
		$campaign = new Campaign_model();
		$campaign->by_id($campaign_id);
		
		// ALWAYS CONFIRM CAMPAIGN ID REALLY BELONGS TO THE LOGGED USER!!!!
		if( (!$campaign->valid()) OR $campaign->user_id != $this->user->id) 
		{
			$this->input->is_ajax_request() ? $this->ajax_message(lang_line('front_error_invalid_campaign',false)) : redirect(lang_base_url('user/dashboard'));
		}
		
		$page_id = $this->input->post('facebook_page_select',true);
		$tab_name = $this->input->post('facebook_tab_name',true);
		$campaign->initialize();
		
		// try to get the facebook user and check permissions
		$this->load->library('FB');
		FB::forge($campaign->application->fb_app_id,$campaign->application->fb_app_secret);
		$fbuser = FB::user();
		if(!$fbuser->valid()) $this->ajax_message(lang_line('front_error_invalid_campaign',false));
		
		// user is valid, so check if we've register on our DB
		$this->load->model('facebook_user_model');
		$local_fb_user = new Facebook_user_model();
		$local_fb_user->update_from_facebook($fbuser);
		
		// try to install the app
		$fbpage = FB::page($page_id);
		$result = $fbpage->install_app($campaign->application->fb_app_id,$tab_name);
		if(!$result) $this->ajax_message(lang_line('front_error_install_tab_problem',false));
		
		$campaign->wipe_actives($campaign->user_id, $fbpage->id, $campaign->app_type_id);
		// app is installed, so update the campaign data
		$campaign->fb_page_id = $fbpage->id;
		$campaign->fb_user_id = $fbuser->id;
		$campaign->fb_page_link = $fbpage->link;
		$campaign->fb_page_title = $fbpage->name;
		$campaign->active = 1;
		$campaign->save();
		
		$data['local_fb_user'] = $local_fb_user;
		$data['fb_page'] =  $fbpage;
		$data['campaign'] = $campaign;
		
		$html = $this->template->view('app/common_page_installed',$data,false);
	
		$this->ajax_message('Ok','OK', $html);
	}
	
	public function on_payment()
	{
		$args = func_get_args();
		// first argument must be the status
		$status = array_shift($args);
		// recompose the token
		$token = implode('/',$args);
		
		$campaign = new Campaign_model();
		$valid = $campaign->from_payment_token($token);
		
		if($valid) $campaign->initialize();
		
		// Validation on $status ???
		if($status=='ok' AND $valid !== false)
		{
			// update the campaign payment status. get the logic from the application model
			$campaign->valid_date = $campaign->application->on_payment_get_valid_date();
			$campaign->save();
			
			//redirect to the campaign installation tab
			$url = '/app/config/'.$campaign->id.$campaign->application->after_payment_ok;
			
		}
		else
		{
			// have a valid token ? redirect to the payment tab
			if($valid)
			{
				// set a session message so we can display it to the user;
				$message = lang_line('app_error_from_payment_platform',false);
				$this->session->set_flashdata('payment_error', $message);
				$url = '/app/config/'.$campaign->id.$campaign->application->after_payment_error;
			}
			else
			{
				// we don't have a valid token... hack attempt?
				// add more logic here? logout the current user?
				// 
				$url = '/user/dashboard';
			}
		}
		
		redirect(lang_base_url($url));
	}
	
	public function request_activation($campaign_id)
	{
		$campaign = new Campaign_model();
		$campaign->by_id($campaign_id);
		
		// ALWAYS CONFIRM CAMPAIGN ID REALLY BELONGS TO THE LOGGED USER!!!!
		if( (!$campaign->valid()) OR $campaign->user_id != $this->user->id) 
		{
			$this->input->is_ajax_request() ? $this->ajax_message(lang_line('front_error_invalid_campaign',false)) : redirect(lang_base_url('user/dashboard'));
		}
		
		$data['username'] = $this->user->firstname . ' ' . $this->user->lastname;
		$data['email']	= $this->user->email;
		$data['date'] = date('Y-m-d H:i');
		$data['campaign_id'] = $campaign->id;
		$data['campaign_title'] = $campaign->title;
		$data['app_tye'] = App_model::applications($campaign->app_type_id);
		$message = $this->template->view('emails/campaign_activation_request',$data,true);
		
		$this->load->library('email');
		$config['mailtype'] = 'html';
		$config['wordwrap'] = TRUE;
		
		$this->email->initialize($config);
		$this->email->from($this->config->item('email_no_replay','front'));
		$this->email->to($this->config->item('email_contact','front'));

		$this->email->subject('Solicitud de activación de campaña',false);
		$this->email->message($message);
		$this->email->send();
		
		$campaign->activation_requested = true;
		//$campaign->save();
		$this->ajax_message(lang_line('campaign_activation_requested',false),'ok');
	}
	
	public function change_repository_status($campaign_id)
	{
		$campaign = new Campaign_model();
		$campaign->by_id($campaign_id);
		
		// ALWAYS CONFIRM CAMPAIGN ID REALLY BELONGS TO THE LOGGED USER!!!!
		if( (!$campaign->valid()) OR $campaign->user_id != $this->user->id) 
			$this->input->is_ajax_request() ? $this->ajax_message(lang_line('front_error_invalid_campaign',false)) : redirect(lang_base_url('user/dashboard'));
				
		$campaign->in_repository = !$campaign->in_repository;
		
		if($campaign->in_repository)
			uninstall_campaign_from_fanpage($campaign_id);
		
		$campaign->save();
		$this->ajax_message(lang_line('campaign_repository_status_changed',false),'ok');
	}
	
	public function uninstall_campaign_from_fanpage($campaign_id)
	{
		// Load the campaign
		$campaign = new Campaign_model();
		$campaign->by_id($campaign_id);
		$campaign->initialize();
		
		// ALWAYS CONFIRM CAMPAIGN ID REALLY BELONGS TO THE LOGGED USER!!!!
		if( (!$campaign->valid()) OR $campaign->user_id != $this->user->id) 
			$this->input->is_ajax_request() ? $this->ajax_message(lang_line('front_error_invalid_campaign',false)) : redirect(lang_base_url('user/dashboard'));
		
		// If right user, page exists and app is installed, then uninstall app from fanpage
		try 
		{ 
			$this->try_to_uninstall_fanpage($campaign);
			$campaign->fb_page_id = 0;
			$campaign->fb_user_id = 0;
			$campaign->fb_page_link = '';
			$campaign->fb_page_title = '';
			$campaign->active = 0;
			$campaign->save();
		}
		catch (Exception $e) { $this->ajax_message(lang_line('campaign_deleted_error',false) . var_dump($e),'error'); }
		
		$data = array ('campaign_id' => $campaign_id, 'default_tab_name' => $campaign->application->fb_default_tab_name, 'facebook_app_id' => $campaign->application->fb_app_id);
		$html = $this->template->view('app/common_page_not_installed',$data,false);
		
		$this->ajax_message(lang_line('campaign_deleted_ok',false),'ok', $html);
	}
	
	public function delete_campaign($campaign_id)
	{
		// Load the campaign
		$campaign = new Campaign_model();
		$campaign->by_id($campaign_id);
		$campaign->initialize();
		
		// ALWAYS CONFIRM CAMPAIGN ID REALLY BELONGS TO THE LOGGED USER!!!!
		if( (!$campaign->valid()) OR $campaign->user_id != $this->user->id) 
			$this->input->is_ajax_request() ? $this->ajax_message(lang_line('front_error_invalid_campaign',false)) : redirect(lang_base_url('user/dashboard'));
		
		try 
		{ 
			// If right user, page exists and app is installed, then uninstall app from fanpage
			$this->try_to_uninstall_fanpage($campaign);
			// Delete campaing, campaign configuration, campaign validation codes, user content, files
			$campaign->delete_all(); 
		}
		catch (Exception $e) { $this->ajax_message(lang_line('campaign_deleted_error',false) . var_dump($e),'error'); }
		
		$this->ajax_message(lang_line('campaign_deleted_ok',false),'ok');
	}
	
	protected function try_to_uninstall_fanpage($campaign)
	{
		// try to get the facebook user and check permissions
		$this->load->library('FB');
		FB::forge($campaign->application->fb_app_id,$campaign->application->fb_app_secret);
		$fbuser = FB::user();
		if($fbuser->valid())
		{			
			// user is valid, so check if we've register on our DB
			$this->load->model('facebook_user_model');
			$local_fb_user = new Facebook_user_model();
			$local_fb_user->update_from_facebook($fbuser);
			
			if($local_fb_user->valid())
			{
				// if page exists, then try to uninstall the app
				$fbpage = FB::page($campaign->fb_page_id);
				if ($fbpage)
					$fbpage->uninstall_app($campaign->application->fb_app_id);				
			}
		}
	}
	
	public function preview($campaign_id,$status)
	{
		$campaign = new Campaign_model();
		$campaign->by_id($campaign_id);
		
		// ALWAYS CONFIRM CAMPAIGN ID REALLY BELONGS TO THE LOGGED USER!!!!
		if( (!$campaign->valid()) OR $campaign->user_id != $this->user->id) 
		{
			$this->input->is_ajax_request() ? $this->ajax_message(lang_line('front_error_invalid_campaign',false)) : redirect(lang_base_url('user/dashboard'));
		}		

 		$campaign->load_config();
 		
		// rebuild the app language
		$default_language = $this->config->item('default_language');
		list($lang, $locale) = $this->i18n->parse($default_language);
		
		$language = $campaign->config->item('app_language') ?: $lang;

		// as we are not using i18n on the facebook app, always load the fallback
		$fallbacks = $this->config->item('language_fallbacks');
		$app_lang = $fallbacks[$language];
 		
 		$campaign->initialize();
 		$campaign->application->load_language($app_lang);
		$campaign->application->post_hydrate();
		
		$property_name = 'look_'.$status.'_mode';
		$mode = $campaign->application->{$property_name}->value;
		$content = ($mode != 'default') ? $this->{$property_name}->value : '';
		
		$data['user_content'] = $campaign->application->get_standard_content($mode, $content,$status);
		$data['campaign'] = $campaign;
		
		//print_r($campaign->application->properties());
		
		$view = $status == 'campaign' ? $campaign->application->type().'_preview' : 'standard_preview';
		
		$html = $this->template->view('app/'.$view, $data);
		echo($html);
	}
	
	/* Functions for handling images */
	protected function _check_media_folder($campaign_id)
	{
		if(!file_exists("user_files/".$campaign_id))
			mkdir("user_files/".$campaign_id, 0777); // base folder for campaign images
			
		if(!file_exists("user_files/".$campaign_id.'/contest'))
			mkdir("user_files/".$campaign_id.'/contest', 0777); // folder for user images on campaign
			
		if(!file_exists("user_files/temp"))
			mkdir("user_files/temp", 0777); // temporary directory for uploads
			
		if(!file_exists("user_files/cache"))
			mkdir("user_files/cache", 0777); // cache folder for multiple sized images
	}
	
	protected function _get_campaign_media($campaign_id)
	{
		$this->load->helper('directory');
		$map = directory_map('./user_files/'.$campaign_id);
		
		return $map;
	}
	
	protected function _get_app_media($filename, $campaign_id)
	{
		$pi = pathinfo($filename);
		$ext = strtolower($pi['extension']);
		switch($ext)
		{
			case 'swf':
				$ret = '';
				break;
			default:
				$ret = img(SUBFOLDER.'user_files/'.$campaign_id.'/'.$filename);
		}
		
		return $ret;
	}
	
	public function delete_app_media()
	{
		$fileName = $this->input->post('fileName');
		$campaign_id = $this->input->post('campaign_id');
		$delFilePath = $_SERVER['DOCUMENT_ROOT'] . SUBFOLDER . 'user_files/' .$campaign_id.'/'.$fileName;
		if (file_exists($delFilePath)) {
			if(unlink ($delFilePath))
				$this->ajax_message(lang_line('file_deleted',false) . ' ' . $_SERVER['DOCUMENT_ROOT'] . ' ' . $delFilePath, 'ok');
			else
				$this->ajax_message(lang_line('no_permissions_to_file_deleted',false) . ' ' . $_SERVER['DOCUMENT_ROOT'] . ' ' . $delFilePath);
		}
		else
		{
			$this->ajax_message(lang_line('file_does_not_exist',false). ' doc root ' . $_SERVER['DOCUMENT_ROOT'] . ' delfile ' . $delFilePath);
		}
	}
	
	public function extract_winners($campaign_id)
	{
		$campaign = new Campaign_model();
		$campaign->by_id($campaign_id);
		
		// ALWAYS CONFIRM CAMPAIGN ID REALLY BELONGS TO THE LOGGED USER!!!!
		if( (!$campaign->valid()) OR $campaign->user_id != $this->user->id) 
		{
			$this->input->is_ajax_request() ? $this->ajax_message(lang_line('front_error_invalid_campaign',false)) : redirect(lang_base_url('user/dashboard'));
		}
		
		$campaign->initialize();
		//$campaign->application->load_language();
		$campaign->save_config();
		
		$mode = $this->input->post('app_winners_extract_mode');
		$qty = $this->input->post('app_winners_qty');
		
		$winners = $campaign->application->extract_winners($campaign_id, $mode, $qty);
		
		echo(json_encode($winners));
	}
	
	public function get_winners_list($campaign_id)
	{
		$campaign = new Campaign_model();
		$campaign->by_id($campaign_id);
		
		// ALWAYS CONFIRM CAMPAIGN ID REALLY BELONGS TO THE LOGGED USER!!!!
		if( (!$campaign->valid()) OR $campaign->user_id != $this->user->id) 
		{
			$this->input->is_ajax_request() ? $this->ajax_message(lang_line('front_error_invalid_campaign',false)) : redirect(lang_base_url('user/dashboard'));
		}
		$campaign->initialize();
		
		$winners = $campaign->application->get_winners_list($campaign_id);
		echo(json_encode($winners));
	}
	
	public function export_users($campaign_id, $mode)
	{
		$campaign = new Campaign_model();
		$campaign->by_id($campaign_id);
		
		// ALWAYS CONFIRM CAMPAIGN ID REALLY BELONGS TO THE LOGGED USER!!!!
		if( (!$campaign->valid()) OR $campaign->user_id != $this->user->id) 
		{
			$this->input->is_ajax_request() ? $this->ajax_message(lang_line('front_error_invalid_campaign',false)) : redirect(lang_base_url('user/dashboard'));
		}
		$this->load->language('report',CURRENT_LANGUAGE);
		
		$campaign->initialize();
		$users = $campaign->application->export_users($campaign_id,$mode);
	}
	
	public function aprove_content($content_id, $aprove = true)
	{
		$this->load->model('user_content_model');
		$content = new User_content_model();
		$content->by_id($content_id);
		if($aprove)
		{
			$content->reported = 1;
			$content->save();
		}
		else
		{
			$content->delete();
		}
	}
}