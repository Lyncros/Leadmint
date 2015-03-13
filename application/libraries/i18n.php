<?php  if (!defined('BASEPATH')) exit('No direct script access allowed');
include_once('i18n/locale.php');

class I18n {

	var $list = null;
	var $language_names = null;
	
	public function __construct()
	{
		$ci = &get_instance();
		$ci->load->config('i18n',true);
		
		$list = $ci->config->item('i18n','i18n');
		foreach($list as $key => $item)
		{
			$locale = new Locale($key, $item);
			$this->list[$key] = $locale;
		}
		
		$this->language_names = $ci->config->item('language_names','i18n');
		
		
		
	}
	
	public function get_dropdowns($i18n = null,$timezone=null)
	{

		$country_options = array();
		$language_options = array();
		$timezone_options = array();
		
		foreach($this->list as $locale)
		{
			
			$current = ($locale->i18n == $i18n);
			
			$language_option = '<option value="'.$locale->language.'" '. ($current ? 'selected="selected"' : '') .'>'.$this->language_names[$locale->language].'</option>';
			if(!isset($language_options[$locale->language])) $language_options[$locale->language] = $language_option;
			
			
			$country_option = '<option value="'. $locale->abbr .'" lang="'.$locale->language.'" '. ($current ? 'selected="selected"' : '') .'>'.$locale->country.'</option>';
			$country_options[] = $country_option;
			
			foreach($locale->get_timezones() as $timezone)
			{
				$current_zone = ($current AND ($timezone->name == $timezone));
				$timezone_option = '<option value"'.$timezone->name.' i18n="'.$locale->i18n.'" '. $current_zone ? 'selected="selected"' : '' .'>'.$timezone->name.'</option>';
				$timezone_options[] = $timezone_option;
			}
		}
		
		$language_select = '<select name="i18n_select_language" id="i18n_select_language">'.PHP_EOL.implode(PHP_EOL,$language_options).'</select>';
		
		$country_select = '<select name="i18n_select_country" id="i18n_select_country">'.PHP_EOL.implode(PHP_EOL,$country_options).'</select>';
		
		$timezone_select = '<select name="i18n_select_timezone" id="i18n_select_timezone">'.PHP_EOL.implode(PHP_EOL,$timezone_options).'</select>';
		
		return array($language_select, $country_select, $timezone_select);
	}
	
	public function parse($locale)
	{
		return explode('_',$locale);
	}
}