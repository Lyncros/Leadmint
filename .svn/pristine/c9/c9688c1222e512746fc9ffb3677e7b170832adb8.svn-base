<?php
include_once('fb/base_facebook.php');
include_once('fb/facebook.php');

class FB {
	
	private static $instance = null;
	
	public static function forge($appId,$secret)
	{
		$config = array(
  			'appId'  => $appId,
  			'secret' => $secret);
  		
		self::$instance = new Facebook($config);
	}
	
	public static function instance()
	{
		return self::$instance;	
	}

	public static function user($uid=null)
	{
		try
		{	
			$uid || $uid = self::$instance->getUser();
			$user = self::$instance->api('/'.$uid);
		} catch (Exception $e){
			// habilitar debug meintras testeamos o devolver un usuario vacio
			//print_r($e);
			//die();
			return new FBUser();
		}
		
		if(!empty($user)){
			return new FBUser($user);
		} else {
			// habilitar debug meintras testeamos o devolver un usuario vacio
			//print_r($e);
			//die();
			return new FBUser();
		}

	}
	
	public static function page($fb_page_id)
	{	
		try {
			$page = self::$instance->api('/'.$fb_page_id);		
		} catch (Exception $e){
			// habilitar debug meintras testeamos o devolver un usuario vacio
			//print_r($e);
			//die();
			return new FBPage();
		}
		
		if(!empty($page)){
			return new FBPage($page);
		} else {
		// habilitar debug mientras testeamos o devolver un usuario vacio
			//print_r($e);
			//die();
			return new FBPage();
		}
	}
	
	public static function signed_request()
	{
		return self::$instance->getSignedRequest();
	}
	
}

class FBUser {
	private $valid = false;
	private $data = array();
	private $permissions = null;
	
	public function __construct($fb_user_array=array())
	{
		$this->data = $fb_user_array;
		$this->valid = isset($this->data['id']);
	}
	
	public function valid()
	{
		return $this->valid;
	}
	
	private function validate_id($uid = null)
	{
		$uid || $uid = ($this->valid ? $this->data['id'] : null); 
		
		if(is_null($uid))
		{
			die('Invalid user id');
		}
	}
	
	public function permissions($permissions_to_test = null)
	{
		if(is_null($this->permissions))
		{
			//$uid = $this->validate_id($uid);
			$url = 'me/permissions';
			$perms = FB::instance()->api($url);
			print_r($perms);
			$this->permissions = isset($perms['data'][0]) ? $perms['data'][0] : null;
		}
		
		if(is_null($this->permissions)) return false;
		
		// si testeamos, devolvemos boolean
		if($permissions_to_test)
		{
			$flag = true;
			$permissions_to_test = is_array($permissions_to_test) ? $permissions_to_test : explode(',', $permissions_to_test);
			//print_r($this->permission);
			foreach($permissions_to_test as $perm)
			{
				if( (!isset($this->permissions[$perm])) OR $this->permissions[$perm] != 1) 
				{
					$flag = false;
				}
				
			}
			
			return $flag;
		}
		// si no testeamos, devolvemos el array de permisos
		return $this->permissions;
	}
	
	// Magic functions 
	function __get($key)
	{	
		if(array_key_exists($key,$this->data)) 
		{
			return $this->data[$key];
		}
		
		return false; // CAREFULL HERE!
	}
	
	function __set($key,$value)
	{	
		$this->data->{$key} = $value;
	}
	
	public function data()
	{
		return $this->data;
	}
	
	public function dump()
	{
		echo '<pre>';
		var_dump($this->data);
		echo '</pre>';
	}

}

class FBPage {
	
	private $valid = false;
	private $data = array();
	
	public function __construct($fb_page_array=array())
	{
		$this->data = $fb_page_array;
		$this->valid = isset($this->data['id']);
	}
	
	public function get_token()
	{
		$url = $this->data['id'].'?fields=access_token';
		$data = FB::instance()->api($url);
		$token = isset($data['access_token']) ? $data['access_token'] : false;
		
		return $token;
	}
	
	public function install_app($app_id, $tab_name = null)
	{
		$token = $this->get_token();
		if(!$token) return false;
		
		$params['access_token'] = $token;
		$params['app_id'] = $app_id;
		
		$url = $this->data['id'].'/tabs';
		$result = FB::instance()->api($url,'post',$params);
		
		if($result AND $tab_name)
		{			
			// get the tab where the app was installed
			$url = $this->data['id'].'/tabs/'.$app_id.'?access_token='.$token;
			$result2 = FB::instance()->api($url);
			$data = isset($result2['data'][0]) ? $result2['data'][0] : false;
			if($data)
			{				
				$url = $this->data['id'].'/tabs/'.$data['id'];
				$url = $data['id'];
				
				$params = array('custom_name'=>$tab_name,'access_token'=>$token);
				$result = FB::instance()->api($url,'post', $params);
			}
		}
		
		return $result == 1 ?: false;		
	}
	
	public function uninstall_app($app_id)
	{
		$token = $this->get_token();
		if(!$token) return false;
		
		// get the tab where the app was installed
		$url = $this->data['id'].'/tabs/'.$app_id.'?access_token='.$token;
		$fb_fanpage_app = FB::instance()->api($url);
		$fanpage_data = isset($fb_fanpage_app['data'][0]) ? $fb_fanpage_app['data'][0] : false;
		
		if($fanpage_data)
		{				
			$params['access_token'] = $token;
			$url = $fanpage_data['id'];
			// Uninstall app
			FB::instance()->api($url,'delete',$params);		
		}		
	}
	// Magic functions 
	function __get($key)
	{	
		if(array_key_exists($key,$this->data)) 
		{
			return $this->data[$key];
		}
		
		return false; // CAREFULL HERE!
	}
	
	function __set($key,$value)
	{	
		$this->data->{$key} = $value;
	}
	
	public function data()
	{
		return $this->data;
	}
	
	public function dump()
	{
		echo '<pre>';
		var_dump($this->data);
		echo '</pre>';
	}
}