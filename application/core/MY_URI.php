<?php 

// Extends CI URI to support language folders

class MY_URI extends CI_URI
{
	public $current_language = '';
	public $is_default_language = true; // to know if current_language is default or chose by user
	
	function __construct()
	{
		parent::__construct();
		$this->current_language = $this->config->item('default_language');
		$this->config->set_item('lang_url', $this->config->item('base_url'));
	}
	
	function _explode_segments()
	{
		
		// default language setting, no language present in the url, use default language
		$this->config->set_item('lang_url', $this->config->item('base_url'));
		
		
		parent::_explode_segments();
		$langs = $this->config->item('languages');
		$fallbacks = $this->config->item('language_fallbacks');
		
		if( count($this->segments) AND array_key_exists($this->segments[0], $langs ) ) // language is present in the url
		{
			$lang = $this->segments[0];
			
			$this->config->set_item('lang_url', $this->config->item('base_url').$lang.'/');
			$replace = count($this->segments)>1 ? $lang.'/' : '/'.$lang.'/';
			
			unset($this->segments[0]);
			$this->uri_string = implode('/',$this->segments);
			$this->segments = array_values($this->segments);
			
			$this->current_language = $lang;
			$this->is_default_language = false; 
			return false;
		}
		
		// try to detect browser language, if valid, use as default language
		$accept_langs = $_SERVER['HTTP_ACCEPT_LANGUAGE'];
	    if ($accept_langs !== false)
	    {
	        $accept_langs = strtolower($accept_langs);
	        $accept_langs = explode(",", $accept_langs);
			$lang = explode('-', $accept_langs[0]);
			$i18n = $lang[0].'_'.strtoupper($lang[1]);
			
			if(array_key_exists($i18n,$langs)) // is a valid site language? override default
			{
				$this->config->set_item('lang_url', $this->config->item('base_url').$i18n.'/');
				return false;
			}
			
			// try to get the language fallbacks
			if(array_key_exists($lang[0], $fallbacks))
			{
				$this->config->set_item('lang_url', $this->config->item('base_url').$fallbacks[$lang[0]].'/');
			}
			
		}

		
	}
	
	
}
?>