<?php require_once('front_controller.php'); ?>
<?php 

class Super extends Front_controller {
	
	private $login_redirect = null;
	private $auth_exception = array(); // methods to be excluded from 
	
	public function __construct()
	{
		parent::__construct();
		
		$this->login_redirect = lang_base_url('/user/login');
		if( (!$this->user->logged()) OR (!$this->user->is_super) )
			if(!in_array($this->router->method, $this->auth_exception)) redirect($this->login_redirect);
		
	}
	
	public function index()
	{
		
	}
	
	public function users()
	{
		$this->load->model('user_model');
		$users = new User_model();
		
		list($current_url,$page_url,$sort_url) = $this->_strip_url();
		
		if( ! empty($_POST))
		{	
			$url = $this->_write_filter($_POST);
			$url = $sort_url.$url;
			redirect($url);
		}
		
		$args = $this->uri->ruri_to_assoc();
		list($args, $page,$per_page,$sort,$sort_mode) = $this->_strip_paged_args($args);
		
		$filters = array('filter_firstname' => '', 'filter_lastname' => '', 'filter_email' => '','filter_is_super'=>'', 'filter_active'=>''); // define the list of possible filters
		$filters = (object)array_merge($filters,$args); // assign $_POST values to the filters

		$filters->filter_firstname ? $users->like('firstname', $filters->filter_firstname) : null;
		
		$filters->filter_lastname ? $users->like('lastname', $filters->filter_lastname) : null;
		
		$filters->filter_active ? : $users->where('active',1);
		
		$filters->filter_email ?  $users->like('email', $filters->filter_email) : null;
		
		$filters->filter_is_super ? $users->where('is_super',1): null;
		
		$users->get_paged($page,$per_page);
		
		
		
		$this->data->pagination = $this->template->view('pagination',array('paged' => $users->paged, 'base_url' => $page_url), false);
		$this->data->filters = $filters;
		$this->data->users = $users;
		$this->render('super/users');
	}
	
	public function campaigns()
	{
		$this->load->model('campaign_model');
		$campaigns = new Campaign_model();
		
		list($current_url,$page_url,$sort_url) = $this->_strip_url();
		
		if( ! empty($_POST))
		{	
			$url = $this->_write_filter($_POST);
			$url = $sort_url.$url;
			redirect($url);
		}
		
		$args = $this->uri->ruri_to_assoc();
		list($args,$page,$per_page,$sort,$sort_mode) = $this->_strip_paged_args($args);
		
		$filters = array('filter_title' => '', 'filter_app_type' => '', 'filter_show_inactive' => '','filter_user_id'=>'', 'filter_user_name'=>'', 'filter_show_only_invalid' => ''); // define the list of possible filters
		$filters = (object)array_merge($filters,$args); // assign $_POST values to the filters
		$filters->filter_user_name = urldecode($filters->filter_user_name);

		$filters->filter_app_type ? $campaigns->where('app_type_id',$filters->filter_app_type) : null;
		
		$filters->filter_user_id ? $campaigns->where('user_id', $filters->filter_user_id) : null;
		
		
		if($filters->filter_show_only_invalid)
		{
			$campaigns->where('campaign.valid_date =',0);
		} 
		else
		{
			$filters->filter_show_inactive ? : $campaigns->where('campaign.active',1);
		}
		
		$campaigns->join('user','campaign.user_id = user.id','left');
		$campaigns->select('campaign.*, user.firstname, user.lastname');
		$campaigns->get_paged($page,$per_page);

		
		$this->template->css('js/autocomplete/jquery.autocomplete.css');
		$this->template->js('js/autocomplete/jquery.autocomplete.js');
		
		$this->data->pagination = $this->template->view('pagination',array('paged' => $campaigns->paged, 'base_url' => $page_url), false);
		$this->data->filters = $filters;
		$this->data->campaigns = $campaigns;
		$this->data->current_page = $page;
		$this->render('super/campaigns');
	}
	
	public function campaign_list()
	{
		$this->load->model('campaign_model');
		$campaigns = new Campaign_model();
		
		list($current_url,$page_url,$sort_url) = $this->_strip_url();
				
		$args = $this->uri->ruri_to_assoc();
		
		list($args,$page,$per_page,$sort,$sort_mode) = $this->_strip_paged_args($args);
		
		$filters = array('filter_title' => '', 'filter_app_type' => '', 'filter_show_inactive' => '','filter_user_id'=>'', 'filter_user_name'=>'', 'filter_show_only_invalid' => ''); // define the list of possible filters
		$filters = (object)array_merge($filters,$_POST); // assign $_POST values to the filters
		$filters->filter_user_name = urldecode($filters->filter_user_name);

		$filters->filter_app_type ? $campaigns->where('app_type_id',$filters->filter_app_type) : null;
		
		$filters->filter_user_id ? $campaigns->where('user_id', $filters->filter_user_id) : null;
				
		if($filters->filter_show_only_invalid)
		{
			$campaigns->where('campaign.valid_date =',0);
		} 
		else
		{
			$filters->filter_show_inactive ? : $campaigns->where('campaign.active',1);
		}
		
		$campaigns->join('user','campaign.user_id = user.id','left');
		$campaigns->select('campaign.*, user.firstname, user.lastname');
		
		$campaigns->get_paged($page,$per_page);
				
		$this->data->campaigns = $campaigns;
		$this->data->pagination = $this->template->view('pagination',array('paged' => $campaigns->paged, 'base_url' => $page_url), false);
		$this->data->filters = $filters;
		$this->data->current_page = $page;
		$this->ajax_message(lang_line('app_record_saved',false),'OK', $this->template->view('super/campaign_list',array('campaigns' => $campaigns),false));
	}
	
	public function users_autocomplete()
	{		
		$search = $this->input->post('q');

		$this->load->model('user_model');
		$model = new User_model();
		$model->distinct()->select('user.firstname, user.lastname, user.id')
			->join('campaign', 'user.id = campaign.user_id');
		$model->order_by('firstname,lastname');
		$rs = $model->where("firstname like '%$search%' or lastname like'%$search%'")->get_records();
		//echo($model->last_query());
		
		foreach ($rs as $record) {
			$key = $record->firstname . ' ' . $record->lastname;
			$value = $record->id;
			echo "$key|$value\n";
		}
	}
	
	public function toggle_campaign_valid($campaign_id)
	{
		$this->load->model('campaign_model');
		$campaign = new Campaign_model();
		$campaign->by_id($campaign_id);
		$campaign->valid_date = $campaign->valid_date == -1 ? 0 : -1;
		$campaign->save();
		$this->ajax_message($campaign->valid_date, 'ok');
	}
	
	public function toggle_user_active($user_id)
	{
		$this->load->model('user_model');
		$user = new User_model();
		$user->by_id($user_id);
		$user->toggle('active');
		$this->ajax_message($user->active, 'ok');
	}
	
	public function toggle_user_super($user_id)
	{
		$this->load->model('user_model');
		$user = new User_model();
		$user->by_id($user_id);
		$user->toggle('is_super');
		$this->ajax_message($user->is_super, 'ok');
	}
}