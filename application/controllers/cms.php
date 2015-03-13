<?php require_once('front_controller.php'); ?>
<?php 

class Cms extends Front_controller {
	
	public function index()
	{
		$this->render('cms/index');
	}
	
	// later on, functions can be replaced with a url database look-up
	public function promos() {
		$this->render('cms/promos');
	}

	public function exchange() {
		$this->render('cms/exchange');
	}
	
	public function reg() {
		$this->render('cms/reg');
	}

	public function _remap()
	{
		
		$url_segments = $this->uri->total_segments() > 0 ? array_values($this->uri->segment_array()) : array('index');
		$method = $url_segments[0];
		
		if(method_exists($this,$method))
		{
			array_shift($url_segments);
			$this->$method($url_segments);	
		}
		else
		{
			$this->render('cms/404');
		}
	}
}