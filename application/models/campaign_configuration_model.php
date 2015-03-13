<?php

class Campaign_configuration_model extends MY_Model {

	protected $table = 'campaign_configuration';
	protected $fields = array(
		'id'   		=> array(),
		'campaign_id'  	=> array(
			'rules'  => array('required'),
		),
		'field_name'	=> array(),
		'field_value'	=> array(),
		
	);
	
	protected $config = null;
	
	
	public function initialize($campaign_id, $config = array())
	{
		foreach($config as $field_name => $default_value)
		{
			$this->db->insert($this->table, array('campaign_id'=>$campaign_id, 'field_name'=>$field_name, 'field_value'=>$default_value));
		}
	}
	
	public function update($campaign_id, $config = array())
	{
		foreach($config as $field_name => $default_value)
		{
			
			// check if field exists, delete on production?
			$this->where('campaign_id', $campaign_id)
				->where('field_name',$field_name)
				->get_row();
			$this->field_name = $field_name;
			$this->campaign_id = $campaign_id;
			$this->field_value = $default_value;
			$this->save();
		}
	}
	
	public function by_campaign($campaign_id)
	{
		
		if(is_array($campaign_id))
		{
			if(!count($campaign_id)) return array();
			$this->where_in('campaign_id', $campaign_id);
		}
		else
		{
			$this->where('campaign_id', $campaign_id);
		}
		$this->get_records();
		return $this;
	}
	
	public function as_array()
	{
		if( ! is_null($this->config) ) return $this->config;
		
		$this->config = array();
		foreach($this->query_records as $record)
		{
			$this->config[$record->field_name] = $record->field_value;
		}
		return $this->config;
	}
	
	
	public function as_object()
	{
		$ret = new stdClass();
		foreach($this->query_records as $record )
		{
			$ret->{$record->field_name} = $record->field_value;
		}
		return $ret;
	}
	public function by_campaign_field($campaign_id, $field_name)
	{
		$this->where('campaign_id', $campaign_id)
			->where('field_name', $field_name)
			->get_row();
			
		if(!$this->id)
		{
			$this->campaign_id = $campaign_id;
			$this->field_name  = $field_name;
		}
		return $this->field_value;
	}
	
	public function copy_configuration($old_campaign_id, $new_campaign_id)
	{
		$rs = $this->where('campaign_id', $old_campaign_id)->get()->result();
		foreach($rs as $row)
		{
			$conf = new Configuration_model();
			$conf->field_name = $row->field_name;
			$conf->field_value = $row->field_value;
			$conf->campaign_id = $new_campaign_id;
			$conf->save();
		}	
	}
	
	public function item($key, $default = false)
	{
		return array_key_exists($key, $this->as_array()) ? $this->config[$key] : $default;
	}
	
	function delete_all_by_campaign_id($campaign_id){
		$this->load->database();
		$this->db->delete($this->table, array('campaign_id' => $campaign_id)); 
	}
}