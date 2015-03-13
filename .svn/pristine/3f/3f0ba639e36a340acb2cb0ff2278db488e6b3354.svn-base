<?php require_once('fbapp.php') ?>
<?php
class Code_validator extends Fbapp {
	
	public function __construct()
	{
		parent::__construct();
		
		//load and get a model instances, so we can get the configuration variables
		$this->load->model('app/code_validator_model');
		$this->app_model = new Code_validator_model();
		
		// now we can do the common initialization;
		$this->initialize();		
	}
	
	public function index()
	{
		// evaluate the campaign logic
 		// asking the app_model what to show
 		
 		list($status, $mode, $content) = $this->current_campaign->application->get_status($this->current_page->liked);
		
		// use different methods on $status, so they can be overriden
		$method = 'get_view_'.$status;
		$this->$method($mode, $content, true);
	}
	
	public function define_features()
	{
		parent::define_features();
	}
	
	public function get_view_campaign($mode, $content, $comming_from_index = false)
	{
		$data['campaign_link'] = $this->current_page->link;
		$data['user_content']  = $this->get_standard_content($mode,$content,'campaign');
		$data['facebook_app_id'] = $this->current_campaign->application->fb_app_id;
		
		$data['analytics'] = $this->get_analytics(!$comming_from_index);
		
		$data['comments_view'] = $this->features['embedded_wall'] ? $this->load->view('common_comments', array('campaign' => $this->current_campaign,'analytics'=>$data['analytics']), true) : '';
		
		$data['timer_view'] = $this->get_countdown_view(true);
		
		$data['campaign'] = $this->current_campaign;

		$this->render('code_validator_view', $data);
	}
	
	public function save()
	{
		$post = $this->input->post(null, true);
		$campaign_id = $post['campaign_id'];
		$user_id = $post['user_id'];
		$code = $post['code'];
		
		// user data is already stored in the $current_user variable
		// check anyway for errors
		if( ! $this->current_user->valid() ) $this->ajax_message(lang_line('unknown_user_error',false));
		
		// some tempering with the form hidden values?
		if( $this->current_campaign->id != $campaign_id OR $this->current_user->id != $user_id) $this->ajax_message(lang_line('form_tampering', false));
		
		// recheck user is not already participating
		$this->load->model('user_content_model');
		$content = new User_content_model();
		$content->where('campaign_id',$campaign_id)
			->where('facebook_user_id',$user_id)
			->where('category', 'code_validator')
			->get_row();
			
		if( $content->valid() ) $this->ajax_message(lang_line('already_participating',false));
		
		unset($post['campaign_id']);
		unset($post['user_id']);
		
		$content->facebook_user_id = $user_id;
		$content->campaign_id = $campaign_id;
		$content->category = 'code_validator';
		$content->content = serialize($post);
		$content->save();
		
		// set validation code as used by the facebook user
		$this->load->model('app/validation_code_model');
		$validation_code = new Validation_code_model();
		$validation_code->by_code_and_campaign_id($code, $campaign_id);		
		$validation_code->mark_as_used_by($user_id);
		
		$this->ajax_message(lang_line('record_saved',false), 'ok');
	}
	
	public function check_code()
	{
		$this->load->model('app/validation_code_model');
		$validator = new Validation_code_model();
		
		$post = $this->input->post(null, true);
		$campaign_id = $post['campaign_id'];
		$code = $post['code'];
		
		if ($validator->valid_code_for_campaign($code, $campaign_id))
			return 	$this->ajax_message(lang_line('app_code_validator_valid_code_ajax_message',false), 'ok');
		else
			return 	$this->ajax_message(lang_line('app_code_validator_invalid_code_ajax_message',false), 'invalid_code');		
	}
}