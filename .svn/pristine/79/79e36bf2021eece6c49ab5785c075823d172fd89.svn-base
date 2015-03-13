<?php require_once('front_controller.php'); ?>
<?php 

class Preview extends MY_Controller { 
	
	private $login_redirect = null;
	
	public function __construct()
	{
		parent::__construct();
		
		if(!$this->user->logged()) redirect($this->login_redirect);
		
		$this->load->model('campaign_model');
		$this->load->model('app_model');
		
		// language settings
		$this->load->library('i18n');
		$site_lang = $this->uri->current_language; // 
	}
	
	public function page($campaign_id,$status)
	{
		$campaign = new Campaign_model();
		$campaign->by_id($campaign_id);
		
		// ALWAYS CONFIRM CAMPAIGN ID REALLY BELONGS TO THE LOGGED USER!!!!
		if( (!$campaign->valid()) OR $campaign->user_id != $this->user->id) 
		{
			$this->input->is_ajax_request() ? $this->ajax_message(lang_line('front_error_invalid_campaign',false)) : redirect(lang_base_url('user/dashboard'));
		}
 		
		$campaign->load_config();
		
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
		$campaign->application->post_hydrate();
		
		$property_name = 'look_'.$status;
		$mode = $campaign->application->{$property_name.'_mode'}->value;
		$content = ($mode != 'default') ? $campaign->application->{$property_name.'_'.$mode}->value : '';
		$data['user_content'] = $campaign->application->get_standard_content($mode, $content,$status,$campaign_id);
		$data['campaign'] = $campaign;
		
		$view = $status == 'campaign' ? $campaign->application->type().'_preview' : 'standard_preview';
		
		$this->template->theme('front');
/*
			->layout('layout')
			->append('header')
			->append('footer')
			->body_class(strtolower(get_class($this)))
			->main_class($main_class);
*/	
		$html = $this->template->view('app/'.$view,$data);
		echo($html);
	}

}