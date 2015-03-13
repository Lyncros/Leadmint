<?php

class User_content_model extends MY_Model {

	protected $table = 'user_content';
	protected $fields = array(
		'id'   => array(),
		'campaign_id'  => array(
			'rules'  => array('required'),
		),
		'facebook_user_id'  => array(
			'rules'  => array('required'),
		),
		'category'  => array(),
		'content'  => array(),
		'created_at'  => array(),
		'reported' => array(),
	);
	
	
	public function wipe_winners($campaign_id)
	{
		$q = "UPDATE user_content SET winner = 0 WHERE campaign_id = $campaign_id and winner != -1";
		$this->db->query($q);
	}
	
	public function get_campaign_content($campaign_id, $category = null)
	{
		$this->select('facebook_user.name, user_content.*')
			->where('campaign_id', $campaign_id)
			->join('facebook_user','user_content.facebook_user_id = facebook_user.facebook_user_id')
			->order_by('created_at');
		if($category) $this->where('category',$category);
		
		return $this->get_records();
	}
	
	function delete_all_by_campaign_id($campaign_id){
		$this->load->database();
		$this->db->delete($this->table, array('campaign_id' => $campaign_id)); 
	}
}