<?php 

if ( ! function_exists('app_site_url'))
{
	function app_site_url($path = 'index')
	{
		if(defined('APP_TYPE')) return site_url(APP_TYPE.'/'.($path ? $path : 'index'));

		return site_url($path);
	}
}

if ( ! function_exists('app_url'))
{
	function app_url($path = 'index')
	{
		if(defined('APP_TYPE')) return APP_TYPE.'/'. ($path ? $path : 'index');

		return $path;
	}
}

if ( ! function_exists('lang_base_url'))
{
	function lang_base_url($uri = '')
	{
		$ci = &get_instance();
		return $ci->config->lang_base_url($uri);

		return $path;
	}
}

if ( ! function_exists('lang_site_url'))
{
	function lang_site_url($uri = '')
	{	
		$ci = &get_instance();
		return $ci->config->lang_site_url($uri);

		return $path;
	}
}

if ( ! function_exists('lang_current_url'))
{
	function current_lang_url()
	{	
		$ci = &get_instance();
		return $ci->config->lang_url($ci->uri->uri_string());
	}
}

if ( ! function_exists('lang_img_url'))
{
	function lang_img_url($img_url)
	{	
		return '/html/img/'.CURRENT_LANGUAGE.'/'.$img_url;
	}
}

if ( ! function_exists('langline'))
{
	function lang_line($line, $echo=true, $language=null)
	{	
		$ci = &get_instance();
		$trans_line = $ci->lang->line($line);
		$trans_line || $trans_line = '['.($language?: CURRENT_LANGUAGE).'] '.$line;
		
		if($echo) echo $trans_line;
		
		return $trans_line;
	}
}

if ( ! function_exists('dump_request'))
{
	function dump_request()
	{
		echo '<pre>';
		print_r($_REQUEST);
		print_r($_GET);
		echo '</pre>';
	}
}

if ( ! function_exists('dump'))
{
	function dump($what)
	{
		echo '<pre>';
		print_r($what);
		echo '</pre>';
	}
}

if ( ! function_exists('checkbox_status'))
{
	function checkbox_status($value)
	{
		echo($value ? 'checked="checked"': '');
	}
}

if ( ! function_exists('radio_staus'))
{
	function radio_staus($value1,$value2)
	{
		echo($value1==$value2 ? 'checked="checked"': '');
	}
}