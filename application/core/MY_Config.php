<?php (defined('BASEPATH')) OR exit('No direct script access allowed');

class MY_Config extends CI_Config 
{	

	// --------------------------------------------------------------------

	function lang_site_url($uri = '')
	{
		
		if ($uri == '')
		{
			$ret = $this->slash_item('base_url');
			echo $this->slash_item(CURRENT_LANGUAGE);
			
			return $this->slash_item('base_url') . CURRENT_LANGUAGE . '/' . $this->item('index_page');
		}

		if ($this->item('enable_query_strings') == FALSE)
		{
			$suffix = ($this->item('url_suffix') == FALSE) ? '' : $this->item('url_suffix');
			return $this->slash_item('base_url') . CURRENT_LANGUAGE . '/' . $this->slash_item('index_page').$this->_uri_string($uri).$suffix;
		}
		else
		{
			return $this->slash_item('base_url') . CURRENT_LANGUAGE . '/' . $this->item('index_page').'?'.$this->_uri_string($uri);
		}
	}

	// -------------------------------------------------------------

	function lang_base_url($uri = '')
	{
		return $this->slash_item('base_url') . CURRENT_LANGUAGE . '/' . ltrim($this->_uri_string($uri),'/');
	}
	
}