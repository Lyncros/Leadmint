<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed'); ?>
<?php
class Validation_code_model extends MY_Model {

	protected $table = 'campaign_validation_codes';
	
	// FIELDS
	protected $fields = array(
		'id'				=> array(),
		'campaign_id'		=> array(),
		'facebook_user_id'	=> array(),
		'code'				=> array(),
		'already_used'		=> array()
	);
	
	protected $_validation_rules = array('campaign_id'=>'required','facebook_user_id'=>'required','code'=>'required');
	
	public function valid_code_for_campaign($code, $campaign_id)
	{
		$this->where('campaign_id', $campaign_id)
			->where('code', $code)
			->where('already_used', 0);
			
		$records = $this->get_records();
		
		return !empty($records);
	}
	
	public function get_campaign_valid_codes($campaign_id)
	{
		$this->where('campaign_id', $campaign_id);
		
		return $this->get_records();
	}
	
	public function get_campaign_valid_codes_as_codes_array($campaign_id)
	{
		$this->select('code');
		$this->where('campaign_id', $campaign_id);
		
		$counter = 0;
		$result = array();
		foreach($this->get_records() as $aCode)
		{
			$result[$counter] = $aCode->code;
			$counter++;
		}
		
		return $result;
	}
	
	public function by_code_and_campaign_id($code, $campaign_id)
	{
		$this->where('campaign_id', $campaign_id);
		$this->where('code', $code);
		
		$row = $this->db->get($this->table)->row();
		
		$this->hydrate($row);		
		
		return $row;
	}
	
	public function mark_as_used_by($user_id)
	{		
		$this->facebook_user_id = $user_id;
		$this->already_used = 1;
		
		$this->save();
	}
	
	public function deleteByCodes($codes)
	{
		$amountOfCodes = count($codes);
		
		if($amountOfCodes > 0)
		{
			$this->where('code', $codes[0]);
			for ($i = 1; $i < $amountOfCodes; $i++)
				$this->or_where('code', $codes[$i]);			
			
			$this->db->delete($this->table);
		}		
	}
	
	function delete_all_by_campaign_id($campaign_id){
		$this->load->database();
		$this->db->delete($this->table, array('campaign_id' => $campaign_id)); 
	}
}