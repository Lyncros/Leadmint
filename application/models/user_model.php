<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed'); ?>
<?php
class User_model extends MY_Model {
	
	private $ci = NULL;
	
	protected $table = 'user';
	protected $salt = 'salAdo97';
	protected $user_expire = 86500;

	
	// FIELDS
	protected $fields = array(
		'id'			=> array(),
		'firstname'	=> array(),
		'lastname'		=> array(),
		'email'			=> array(),
		'password'		=> array(),
		'is_super'		=> array(),
		'last_login_date'=> array(),
		'last_login_ip'	=> array(),
		'created_at'		=> array(),
		'updated_at'		=> array(),
		'forgotten_password_code' => array(),
		'language'	=> array(),
		'active'	=> array(),
	);
	protected $_validation_rules = array('firstname'=>'required','lastname'=>'required','email'=>'required|email|valid_email');
	
	
	public function hash($password)
	{
		if (empty($password)) return FALSE;
		return  sha1($password . $this->salt);
	}
	
	public function hash_me()
	{
		$this->data->password = $this->hash($this->data->password);
	}
	
	public function login($email, $password, $remember = false)
	{
		if (empty($email) || empty($password)) return false;
		
		$this->where('email', $email)
			->limit(1)
			->get_row();
		
		if ($this->id AND $this->active)
		{
			$password = $this->hash($password);

			if ($this->password === $password)
			{
				if($remember)
					$this->rememberme->setCookie($this->input->post('email'));
				
				$this->doLogin();
				
				return true;
			}
		}
		
		return false;
	}
	
	public function doLogin()
	{
		// update last login
		$this->last_login_date = date('Y-m-d H:i:s');		
		$this->last_login_ip = $this->input->ip_address();
		$this->save();
		
		// save session
		$data = $this->data;
		unset($data->password);
		$this->session->set_userdata('user',  serialize($data));	
	}
	
	public function post_login()
	{
		$email = $this->input->post('email',true);
		$password = $this->input->post('password',true);
		$remember = $this->input->post('remember',true);
		
		if((bool)$email AND (bool)$password)
		{
			return $this->login($email, $password, $remember);
		}
		return false;
	}
	
	/* loads the user from the current session */
	public function load()
	{
		$serialized = $this->session->userdata('user');
		if(!$serialized OR !is_string($serialized)) return false;
		
		$this->hydrate(unserialize($serialized));
		if(!$this->id) return false;
		
		// check the identity
		$this->where(array('email'=>$this->email, 'id'=>$this->id))->get_row();
		if(!$this->id) return false;
	}
	
	public function logout()
	{
		$this->rememberme->deleteCookie();
		$this->session->unset_userdata('user');
	}
	
	public function logged()
	{
		
		return (bool)$this->id AND (bool)$this->email;
	}
	
	public function language($default=null)
	{
		return $this->language ? $this->language : $default;
	}
	
	public function register_me($autologin = true)
	{
		$pass = $this->password;
		$this->hash_me();
		$this->save();
		if($autologin) $this->login($this->email, $pass);
	}
	
	public function register($email, $password, $firstname, $lastname, $language)
	{
		$this->data->email = $email;
		$this->data->password = $this->hash($password);
		$this->data->firstname = $firstname;
		$this->data->lastname = $lastname;
		$this->data->language = $language;
		return $this->save();
	}
	
	public function is_unique()
	{
		if($this->id)
		{
			$this->where('id !=',$this->id);
		}
		$this->where('email',$this->email);
		return $this->count() > 0 ? false : true;
		
	}
	
	public function change_password($password)
	{
		$this->data->password = $this->hash($password);
		$this->save();
		
		$this->login($this->email, $password);
	}
	
	public function fullname()
	{
		return $this->data->firstname . ' ' . $this->data->lastname;
	}
	
	public function findByEmail($email)
	{
		$this->where('email', $email)
			->limit(1)
			->get_row();
	}
	
	public function is_logged_in()
	{
		return $this->id == $this->session->userdata('user')->id;
	}
}
?>