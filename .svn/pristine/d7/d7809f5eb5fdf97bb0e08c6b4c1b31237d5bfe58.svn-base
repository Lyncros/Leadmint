<?php
class Ga_tracker extends MY_Controller {

	public function track($campaign_id)
	{
		// If uri contains camapign id
		if($campaign_id != null)
		{
			// Load and create needed models
			$this->load->model('campaign_model');
			$this->load->model('app_model');
			$campaign = new Campaign_model();
			
			// Gets campaign by id
			$campaign->by_id($campaign_id);
			
			// If campaign exists
			if(is_numeric($campaign->id))
			{
				$campaign->initialize();
				
				$data = array( 	'redirect_url' => $campaign->fb_page_link . '?sk=app_' . $campaign->application->fb_app_id,
								'ga_account' => $campaign->application->google_analytics,
								'track_page_url' => 'leadmint/'. $campaign->fb_page_title);
								
				//Track and redirect
				$this->load->view('ga_tracker', $data);
			}
			else
				redirect(base_url('user/dashboard'));			
		}
		else
			redirect(base_url('user/dashboard'));			
	}
	/* TESTER
	public function track1()
	{
		$data = array( 	'redirect_url' => 'http://leadmint.frubistech.com.ar/en_US/user/login',
						'ga_account' => 'UA-36140183-1',
						'track_page_url' => 'leadmint/test');
						
		//Track and redirect
		$this->load->view('ga_tracker', $data);
	}*/
}