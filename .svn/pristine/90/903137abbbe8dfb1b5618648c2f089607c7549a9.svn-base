<?php  if (!defined('BASEPATH')) exit('No direct script access allowed');

class Locale {
	
	var $i18n		= null;
	var $language 	= null;
	var $abbr 		= null;
	var $country	= null;
	var $timezones	= array();
	
	public function __construct($i18n=null,$data=null)
	{
		if($i18n)
		{
			$this->i18n = $i18n;
			
			if($data)
			{
				$this->language = $data['language'];
				$this->abbr = $data['abbr'];
				$this->country = $data['country'];
				$this->timezones = $data['timezones'];
			}
		}
	}
	
	public function get_timezones()
	{
		$ret = array();
		foreach($this->timezones as $key => $timezone)
		{
			$tz = new stdClass();
			$tz->name = $key;
			$tz->utc = is_array($timezone) ? $timezone[0] : $timezone;
			
			$ret[] = $tz;
		}
		return $ret;
	}
	
	public function get_daylight($timezone)
	{
		
	}
}