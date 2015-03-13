<?php

// Base for all front controllers
class Front_Controller extends MY_Controller {

	public function __construct()
	{
		parent::__construct();
		
		$userLoggedRedirect = false;
		
		$this->load->config('front',true);
		
		// language settings
		$this->load->library('i18n');
		$site_lang = $this->uri->current_language; // 
		// test if user language is available on the site
		$langs = $this->config->item('languages');
		$fallbacks = $this->config->item('language_fallbacks');
		
		// Check if there is info about the user in a cookie
		$cookie_user_email = $this->rememberme->verifyCookie();		
		if ($cookie_user_email) {
			if(!$this->session->userdata('user'))
			{
				// find user id of cookie_user stored in application database
				$this->load->model('user_model');
				$user = new User_model();
				$user->findByEmail($cookie_user_email);
				$user->doLogin();
							
				$this->user = $user;
				
				$userLoggedRedirect = true;
			}
		}		
		
		if($this->user->language)
		{
			if(array_key_exists($this->user->language, $langs))
			{
				$site_lang = $this->user->language;
			}
			else // try fallback languages
			{
				list($lang, $locale) = $this->i18n->parse($this->user->language);
				if(array_key_exists($lang, $fallbacks))
				{
					$site_lang = $fallbacks[$lang];
				}
				else
				{
					$site_lang = $this->config->item('default_language');
				}				
			}		
		}

		if(!defined('CURRENT_LANGUAGE')) define('CURRENT_LANGUAGE', $site_lang);
		
		// load the front common language
		$this->load->language('front', CURRENT_LANGUAGE);
		
		// always load the user language
		$this->load->language('user', CURRENT_LANGUAGE);
		
		// if super, always load the super language
		if($this->user->is_super) $this->load->language('super', CURRENT_LANGUAGE);
		
		// load the specific controller language
		$this->load->language(strtolower(get_class($this)), CURRENT_LANGUAGE);
		
		// load the app_model here, as it depends from CURRENT_LANGUAGE
		$this->load->model('app_model');
		
		$this->title[] = $this->config->item('title', 'front');
		$main_class = $this->uri->segment(1) OR $main_class = 'home';
		$this->template->theme('front')
			->layout('layout')
			->append('header')
			->append('footer')
			->body_class(strtolower(get_class($this)))
			->main_class($main_class);
			
		if($userLoggedRedirect)
			redirect(lang_base_url('user/dashboard'));
	}
	
	
	protected function _write_filter($args)
	{
		$url = '';
		foreach($args as $key => $val)
		{
			if(!$val) continue;
			$url .= "/$key/$val";
		}
		return $url;
		
	}
	
	protected function _strip_url()
	{
		$current_url = current_url();

		$current_url = preg_replace('#.html+#i', '', $current_url);
		$page_url = preg_replace('#/page/\d+#i', '', $current_url);
		$sort_url = preg_replace('#/sort/\w*#i', '', $current_url);
		
		return array($current_url,$page_url,$sort_url);
	}
	
	protected function _strip_paged_args($args, $page = 1, $per_page = 20, $sort = null, $sort_mode = 'ASC')
	{
		$stripped_args = array();
		
		foreach($args as $key=>$value)
		{
			switch($key)
			{
				case 'page':
				 	$page=$value;
				 	break;
				 case 'per_page':
				 	$per_page = $value;
				 	break;
				 case 'sort':
				 	$sort = $value;
				 	break;
				 case 'smode':
				 	$sort_mode = $value;
				 	break;
				 default: 
				 	$stripped_args[$key] = $value;
			}
			
		}
		
		return array ($stripped_args, $page, $per_page, $sort, $sort_mode);
	}
}