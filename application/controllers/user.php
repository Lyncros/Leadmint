<?php require_once('front_controller.php'); ?>
<?php 

class User extends Front_controller {
	
	private $auth_exception = array('register', 'login', 'logout','check_email', 'forgot_password','reset_password'); // methods to be excluded from authentication
	private $login_redirect = null;
	
	public function __construct()
	{
		parent::__construct();
		
		$this->login_redirect = lang_base_url('/user/login');
		if(!$this->user->logged())
			if(!in_array($this->router->method, $this->auth_exception)) redirect($this->login_redirect);
		
	}
	
	public function login()
	{
		$user = new User_model();
		if( $user->post_login() ) redirect(lang_base_url('user/dashboard'));
		
		$this->data->login_email = $this->input->post('email');
		$this->render('user/login');
	}
	
	public function logout()
	{
		$this->user->logout();
		redirect(lang_base_url());
	}
	
	public function register($on_app_id=null)
	{
		// remove this lines to enable the registration
		//$this->render('user/register_closed');
		//return false;
		// end registration disabled
		
		$user = new User_model();
		$user->post_hydrate();
		
		if (($user->validate() == FALSE) || $user->is_unique() == false) // TODO: add is_unique error to the form
		{
			$user->language || $user->language = CURRENT_LANGUAGE;
			list($language_select, $country_select, $timezone_select) = $this->i18n->get_dropdowns($user->language);
			$this->data->language_select = $language_select;
			$this->data->country_select = $country_select;
			$this->data->ruser = $user;
			$this->render('user/register');
		}
		else
		{
			// save the user
			$user->register_me();
			
			// send welcome mail
			$this->load->library('email');
			$config['mailtype'] = 'html';
			$config['wordwrap'] = TRUE;


			$data['email_welcome'] = lang_line('email_welcome', false);
			
			$message = $this->template->view('emails/welcome',$data,true);
			

			$this->email->initialize($config);
			$this->email->from($this->config->item('email_no_replay','front'));
			$this->email->to($user->email);
	
			$this->email->subject(lang_line('email_welcome_subject'), false);
			$this->email->message($message);
			$this->email->send();

			//Mandamos un email al admin para que sepa que alguien se registró
			$data['user_name'] = $user->firstname;
			$data['user_lastname'] = $user->lastname;
			$data['user_email'] = $user->email;
			$request_message = $this->template->view('emails/user_registration_request',$data,true);
			
			$this->email->from($this->config->item('email_no_replay','front'));
			$this->email->to($this->config->item('email_contact','front'));
	
			$this->email->subject(lang_line('email_registration_request_subject'), false);
			$this->email->message($request_message);
			$this->email->send();
			
			// redirect to selected app or select app page
			if($on_app_id)
			{
				redirect(lang_base_url('app/install/'.$on_app_id));
			}
			else
			{
				redirect(lang_base_url('reg'));
			}
		}
	}
	
	public function check_email($asynch = true)
	{
		$user_id = $this->input->post('record_id');
		$email = $this->input->post('email');
		if(!$email) 
		{
			if($asynch) echo 'false';
			return false;
		}
		$user = new User_model();
		$user->where('email',$email);
		if($user_id) $user->where('id !=',$user_id);
		$user->get_row();

		if($asynch) echo  ((bool)$user->id ? 'false' : 'true');
		
		return ($user->id ? false : true); 
	}
	
	public function forgot_password()
	{
		$email = $this->input->post('email',true);
		
		if( ! $email) 
		{
			$this->input->is_ajax_request() ? $this->ajax_message(lang_line('front_error_email',false)) : redirect($this->login_redirect);
		}
		
		$user = new User_model();
		$user->where('email',$email)->get_row();
		
		if( ! $user->valid() ) $this->ajax_message(lang_line('front_error_email_not_exists',false));
		
		// generate forgot code
		$user->forgotten_password_code = sha1(rand(1,20000));
		$user->save();
		
		$data['link'] = lang_base_url('user/reset_password/'.$user->forgotten_password_code);
		
		$this->load->library('email');
		$config['mailtype'] = 'html';
		$config['wordwrap'] = TRUE;
		
		$message = $this->template->view('emails/reset_password',$data,true);
		$this->email->initialize($config);
		
		$this->email->from($this->config->item('email_no_replay','front'));
		$this->email->to($user->email);

		$this->email->subject(lang_line('user_email_reset_password_subject',false));
		$this->email->message($message);
		$this->email->send();
		
		
		$this->ajax_message(lang_line('user_email_reset_password_ajax_ok',false),'ok');
	}
	
	public function reset_password($code=null)
	{
		if(!$code) redirect($this->login_redirect);
		
		$user = new User_model();
		$user->where('forgotten_password_code',$code)->get_row();
		if(!$user->valid())  redirect($this->login_redirect);
		
		$password = $this->input->post('password',true);
		if($password) {
			$user->change_password($password);
			redirect(lang_base_url());
		}
		
		$this->render('user/reset_password');
	}
	
	public function profile()
	{
		
		$rules = $this->input->post('password') ? array('password'=>'required') : null;
		if ( $this->user->validate($rules) != FALSE )
		{
			if($this->input->post('password'))
			{
				$this->user->hash_me();
			}
			// save the user
			$this->user->save();
			$this->data->form_message = lang_line('user_profile_change_success',false);
		}
		
		$this->user->language || $this->user->language = CURRENT_LANGUAGE;
		list($language_select, $country_select, $timezone_select) = $this->i18n->get_dropdowns($this->user->language);
		$this->data->language_select = $language_select;
		$this->data->country_select = $country_select;
		
		$this->data->ruser = $this->user;
		$this->render('user/profile');
	}
	
	public function dashboard()
	{
		$this->show_campaing_list();
	}
	
	public function repository()
	{
		$this->show_campaing_list(true);
	}
	
	public function campaign_list()
	{
		$this->show_campaing_list($this->input->post('show_repository') == '1', true);
	}
	
	private function show_campaing_list($show_repository=false,$only_list=false)
	{
		$this->load->model('campaign_model');
		$campaigns = new Campaign_model();
		
		list($current_url,$page_url,$sort_url) = $this->_strip_url();
		
		$args = array_merge($this->uri->ruri_to_assoc(), $_POST);		
		
		list($args, $page,$per_page,$sort,$sort_mode) = $this->_strip_paged_args($args);
		
		$filters = array('filter_title' => '', 'filter_app_type' => '', 'filter_show_inactive' => ''); // define the list of possible filters
		$filters = (object)array_merge($filters,$args); // assign $_POST values to the filters
		
		$filters->filter_app_type ? $campaigns->where('app_type_id',$filters->filter_app_type) : null;
		$filters->filter_show_inactive ? : $campaigns->where('(active = 1 or active is null)');
		$campaigns->where('in_repository', $show_repository);
		$campaigns->where('user_id', $this->user->id)->get_paged($page,$per_page);
				
		if($only_list)
		{
			$data = array(	'campaigns' => $campaigns, 
							'pagination' => $this->template->view('pagination',array('paged' => $campaigns->paged, 'base_url' => $page_url), false),
							'show_campaign_delete' => $show_repository);
			$this->ajax_message(lang_line('app_campaign_list',false), 'OK', $this->template->view('user/campaign_list', $data, false));						
		}
		else
		{
			$this->data->pagination = $this->template->view('pagination',array('paged' => $campaigns->paged, 'base_url' => $page_url), false);
			$this->data->filters = (object)$filters;
			$this->data->campaigns = $campaigns;
			$this->data->current_page = $page;
			if($show_repository)
				$this->render('user/repository');
			else
				$this->render('user/dashboard');
		}
	}
}