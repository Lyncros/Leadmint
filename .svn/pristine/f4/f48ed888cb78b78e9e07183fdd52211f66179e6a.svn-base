<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed'); ?>
<?php
class Property {

	public $value = null;
	public $label = null;
	public $help = null;
	public $versions = array();
	
	public function __construct($data = null)
	{
		if(isset($data['value'])) $this->value = $data['value'];
		if(isset($data['label'])) $this->label = $data['label'];
		if(isset($data['help'])) $this->help = $data['help'];
		if(isset($data['versions'])) $this->versions = $data['versions'];
	}
	
	public function __toString()
	{
		return $this->value;
	}
	
	public function css_versions()
	{
		return implode(' ', $this->versions);
	}
}