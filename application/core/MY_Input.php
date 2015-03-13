<?php 

class MY_Input extends CI_Input {


	function request($index = '', $xss_clean = FALSE)
	{
		// Check if a field has been provided
		if ($index === NULL AND ! empty($_REQUEST))
		{
			$request = array();

			// Loop through the full _REQUEST array and return it
			foreach (array_keys($_REQUEST) as $key)
			{
				$request[$key] = $this->_fetch_from_array($_REQUEST, $key, $xss_clean);
			}
			return $request;
		}
		
		return $this->_fetch_from_array($_REQUEST, $index, $xss_clean);
	}
}