<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed'); ?>
<?php
class Facebook_user_model extends MY_Model {
	
	protected $table = 'facebook_user';
	
	// FIELDS
	protected $fields = array(
		'id'				=> array(),
		'facebook_user_id'	=> array(),
		'name'				=> array(),
		'first_name'		=> array(),
		'middle_name'		=> array(),
		'last_name'			=> array(),
		'link'				=> array(),
		'birthday'			=> array(),
		'email'				=> array(),
		'timezone'			=> array(),
		'locale'			=> array(),
		'verified'			=> array(),
		'created_at'		=> array(),
	);
	
	protected $_validation_rules = array('firstname'=>'required','lastname'=>'required','email'=>'required|email|valid_email');
		
	// replaces the default behavior and finds by facebook_user_id instead
	public function by_id($id = null)
	{
		$id || $id = $this->data->id;
		if(empty($id)) return $this;
		
		$func = is_array($id) ? 'where_in' : 'where';
		$this->db->$func($this->table.'.facebook_user_id',$id);
		$row = $this->db->get($this->table)->row();
				
		$this->hydrate($row);
		return $row;
	}
	
	public function update_from_facebook($fbuser)
	{	
		if( ! $fbuser->valid() ) return false;
		
		$this->by_id($fbuser->id);
		
		// update only the properies that are present on the $fbuser
		// to not override the already stored data
		$fbuser->id AND $this->facebook_user_id = $fbuser->id;
		$fbuser->name AND $this->name = $fbuser->name;
		$fbuser->first_name AND $this->first_name = $fbuser->first_name;
		$fbuser->last_name AND $this->last_name = $fbuser->last_name;
		$fbuser->link AND $this->link = $fbuser->link;
		$fbuser->email AND $this->email = $fbuser->email;
		$fbuser->birthday AND $this->birthday = $fbuser->birthday;
		$fbuser->timezone AND $this->timezone = $fbuser->timezone;
		$fbuser->locale AND $this->locale = $fbuser->locale;
		$fbuser->verified AND $this->verified = $fbuser->verified;
		
		$this->save();
	}
	
	public function get_campaign_users($campaign_id)
	{
		$this->select('facebook_user.*');
		$this->join('user_content','facebook_user.facebook_user_id = user_content.facebook_user_id')
			->where('campaign_id',$campaign_id)
			->group_by('facebook_user.facebook_user_id')
			->order_by('name');
		
		return $this->get_records();		
	}
}
?>