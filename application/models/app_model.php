<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed'); ?>
<?php
require_once('app/property.php');
class App_model {
		
	private static $app_types= array(
		1	=> 'sweepstakes',
		4   => 'code_validator'
	);
	
	public $app_id = null; // the id to insert in the campaign table
	public $fb_app_id = null; 
	public $fb_app_secret = null;
	
	public $fb_app_name = null;
	public $fb_default_tab_name = null;
	
	// id del tab de la configuración al que tengo que volver despues de hacer un pago
	// dudoso, fijarse si hay una mejor manera de hacerlo
	public $after_payment_ok = null;
	public $after_payment_error = null;
	
	public $versions = array(); // holds the comercial versions and their prices
	
	protected $properties = array(); // abstract list of the app properties
	
	protected $data = null; // instance values
	
	public $status = 'no fan'; // holds the current status of the campaign
	public $status_date = 0; // holds the ending date of the current status of the campaign
		
	public function __construct()
	{
		$this->data = new stdClass();

		//$this->app_id = 1;
	}
	
	public static function forge($app_type_id, $initialize = true)
	{
		$model = self::$app_types[$app_type_id] . '_model';
		
		$ci = &get_instance();
		$ci->load->model('app/'.$model);
		
		$app = new $model();
		
		$app->initialize();
		
		return $app;
	}
	
	protected function initialize($language = null)
	{
		// try to load the app language class
		$classname = strtolower(get_class($this));
		$classname = str_replace('_model','',$classname);
		$app_lang = $classname == 'app' ? $classname : 'app_'.$classname;
		
		// if not defined, use spanish
		if(!defined('CURRENT_LANGUAGE')) define('CURRENT_LANGUAGE', 'es_ES');
		
		// initialize language labels		
		$this->load->language($app_lang, $language ?: CURRENT_LANGUAGE);

		// initialize dynamic model fields
		foreach($this->properties as $field_name => $options)
		{			
			// create a new property object and add it to the data object
			$property = new Property($this->properties[$field_name]);
			$property->value = isset($options['default']) ? $options['default'] : '';
			
			$this->data->{$field_name} = $property;			
		}
	}
	
	public function load_language($language=null)
	{
		$classname = strtolower(get_class($this));
		$classname = str_replace('_model','',$classname);
		$app_lang = $classname == 'app' ? $classname : 'app_'.$classname;

		// initialize language labels						
		$this->load->language($app_lang, $language ?: CURRENT_LANGUAGE);
		
		// initialize dynamic model fields
		foreach($this->properties as $field_name => $options)
		{
			// initialize language labels						
			// load text elements (label, help, default value) from language file
			$this->data->{$field_name}->help = lang_line($app_lang.'_'.$field_name.'_help',false,$app_lang);
			$this->data->{$field_name}->label = lang_line($app_lang.'_'.$field_name.'_label',false,$app_lang);			
		}
	}
	
	public function properties()
	{
		return $this->data;
	}
	
	public function as_array($what = 'value')
	{
		$ret = array();
		foreach($this->data as $key => $property)
		{
			if($what)
			{
				$ret[$key] = $property->{$what};
			}
			else
			{
				$ret[$key] = $property;
			}			
		}
		return $ret;
	}
	
	// Magic functions 
	function __get($key)
	{	
		// if $key is a table field return the field value
		if(property_exists($this->data,$key)) 
		{
			return $this->data->$key;
		}
		
		// else, return the super object property, usually the db object
		$CI =& get_instance();
		return $CI->$key;
	}
	
	function __set($key,$value)
	{	
		$this->data->{$key} = $value;
	}
		
	public function hydrate($row, $return_this = true)
	{		
		if(empty($row)) return $this;

		foreach($row as $key => $value)
		{
			if( ! property_exists($this->data, $key)) continue;
			$this->data->{$key}->value = $value;
		}
		return $this;
	}
	
	public function post_hydrate()
	{
		$data = $this->input->post(null,true);
		is_array($data) OR $data = array();
		$row = $this->preprocess($data);
		return $this->hydrate($row);
	}	

	protected function preprocess($data){ return $data; }
	
	// Function to send data to view
	public function data_after_save($campaign){ return null; }	
	
	public function posted_data()
	{
		$ret = array();
		foreach($this->input->post(null,true) as $key => $value)
		{
			if( ! property_exists($this->data, $key)) continue;
			$ret[$key] = $this->data->{$key}->value;
		}
		return $ret;
	}
	
	// get the application list (or one by id) in the current language
	static function applications($id=null)
	{
		$ci = &get_instance();
		$ci->load->language('app', CURRENT_LANGUAGE);
		$ret = array();
		foreach(self::$app_types as $key => $value)
		{		
			$ret[(string)$key] = lang_line($value, false);
		}
		
		if($id) return $ret[$id];
		
		return $ret;
	}
	
	public function type($id = null)
	{		
		if ($id != null)
			return self::$app_types[$id];
		else 
			return self::$app_types[$this->app_id];
	}
	
	public function name($id = null)
	{
		if ($id != null)
			return self::applications($id);
		else
			return self::applications($this->app_id);
	}
	
	public function dump($what = 'data')
	{
		dump($this->{$what});
	}
	
	public static function dropdown($name, $selected_id = null, $config = null, $append = null)
	{   
		$options =$append ? ($append + self::applications()) : self::applications();

		return form_dropdown($name, $options, $selected_id, $config);
	}	
	
	// OVERRIDE THIS FUNCTIONS IF NEEDED
	public function init_date() { 
		return date(lang_line('front_format_date',false), $this->data->app_date_campaign->value); 
	}
	
	public function end_date() { 
		return date(lang_line('front_format_date',false), $this->data->app_date_close->value); 
	}
	
	public function title()
	{
		return $this->data->app_title->value;
	}
	
	public function on_payment_get_valid_date()
	{
		// by default, applications don't have an end; they are enabled forever
		// override in the application models with a UNIX timestamp if needed
		return -1; 
	}
	
	// we asume that the application has the basic stages: no fan, teaser, campaign, close and winners
	// if not, override the function in the app child model	
	public function get_status($page_liked = false)
	{		
		// first, evaluate fan logic
		if( $this->look_no_fan_mode != 'disabled' )
		{
			if( ! $page_liked ) 
			{
				$mode = $this->look_no_fan_mode->value;
				$content = ($mode != 'default') ? $this->{'look_no_fan_'.$mode}->value : '';
				$this->status = 'no_fan';
				return array('no_fan',$mode,$content);
			}
		}
		
		// fangate is not a problem, take a look to the campaign dates;
		$this->load->helper('date');
		$greenwich_time = time()-date('Z');
		$campaign_time = gmt_to_local($greenwich_time, $this->app_timezone->value);
		
		// Test teaser < campaign date
		if($campaign_time <= $this->app_date_campaign->value) 
		{
			$this->status_date = $this->app_date_campaign->value; 
			
			$mode = $this->look_teaser_mode->value;
			$content = ($mode != 'default') ? $this->{'look_teaser_'.$mode}->value : '';
			$this->status = 'teaser';
			return array('teaser',$mode,$content);
		}
		
		// Test campaign < close date
		if($campaign_time <= $this->app_date_close->value) 
		{
			$this->status_date = $this->app_date_close->value; 
			
			$mode = $this->look_campaign_mode->value;
			$content = ($mode != 'default') ? $this->{'look_campaign_'.$mode}->value : '';
			$this->status = 'campaign';
			return array('campaign',$mode,$content);
		}

		// Test campaign < close date
		if($campaign_time <= $this->app_date_winners->value) 
		{
			$this->status_date = $this->app_date_winners->value; 
			
			$mode = $this->look_close_mode->value;
			$content = ($mode != 'default') ? $this->{'look_close_'.$mode}->value : '';
			$this->status = 'close';
			return array('close',$mode,$content);
		}

		$this->status_date = 0; // set to whatever value 
		// All tests failed, return winners		
		$mode = $this->look_winners_mode->value;
		$content = ($mode != 'default') ? $this->{'look_winners_'.$mode}->value : '';
		$this->status = 'winners';
		return array('winners',$mode,$content);			
	}
	
	public function feature_status($feature)
	{	
		//$this->current_version = $this->app_features;
		$versions = $this->versions;
		
		// embedded wall
		$min_version = $this->{$feature}->versions[0];
		return (boolean)($this->{$feature}->value AND ($versions[$min_version] >= $versions[(string)$this->app_features]));
	}
	
	public function features()
	{
		$features = array();
		foreach($this->properties as $key => $property)
		{
			if(count($property['versions']) < count($this->versions))
			{
				$features[] = $key;
			}
		}
		
		return $features;
	}
	
	public function get_standard_content($mode, $content, $status = 'no_fan', $campaing_id = null)
	{
		$this->load->helper('html');
		
		switch($mode)
		{
			case 'html':
				// do nothing, $content is already valid
				$ret = $content;
				break;
			
			case 'image':
				$pi = pathinfo($content);
				$ext = strtolower($pi['extension']);
				switch($ext)
				{
					case 'swf':
						$ret = '';
						break;
					default:
						
						$ret = img('user_files/'.$campaing_id.'/'.$content);
				}
				break;
				
			default:
				$folder = $this->type();
				$ret = img('html/img/'.$folder.'/'.$status.'.jpg');		
		}
		
		return $ret;		
	}
	
	protected function media($filename,$campaign_id)
	{
		$pi = pathinfo($filename);
		$ext = strtolower($pi['extension']);
		switch($ext)
		{
			case 'swf':
				$ret = '';
				break;
			default:
				$ret = img(SUBFOLDER.'user_files/'.$campaign_id.'/'.$filename);
		}
		
		return $ret;
	}
		
	// methods for getting winners which are enabled for each app
	// override in children classes if needed
	public $app_extract_winners_modes = array(
		'ballot',
		'vote',
		'customize'
	);
	
	public function extract_winners($campaign_id, $mode, $qty)
	{
		$this->load->model('user_content_model');
		// first wipe current winners
		$user_content = new User_content_model();
		$user_content->wipe_winners($campaign_id);
		
		switch($mode)
		{
			case 'ballot':
				return $this->extract_winners_ballot($campaign_id, $qty);
				break;
			case 'vote':
				return $this->extract_winners_vote($campaign_id, $qty);
				break;
			default: //customize
				return $this->extract_winners_customize($campaign_id, $qty);
		}
	}
	
	public function extract_winners_ballot($campaign_id, $qty)
	{
		$type = self::$app_types[$this->app_id];
		$q = "SELECT id, facebook_user_id FROM user_content WHERE campaign_id = $campaign_id and category = '$type' AND (winner >= 0 OR winner IS NULL) GROUP BY facebook_user_id ORDER BY RAND() LIMIT $qty";
		$rs = $this->db->query($q)->result();
		
		//print_r($rs);
		$position = 0;
		foreach($rs as $content)
		{
			$position++;
			$q = "UPDATE user_content SET winner = $position WHERE id = " . $content->id;
			$this->db->query($q);
		}
		
		$q = "SELECT fbu.* FROM facebook_user fbu LEFT JOIN user_content uc on fbu.facebook_user_id = uc.facebook_user_id WHERE uc.winner > 0  AND campaign_id = $campaign_id and category = '$type' ORDER BY uc.winner";
		$rs = $this->db->query($q)->result();
		
		return $this->get_winners_list($campaign_id);
	}
	
	public function extract_winners_vote($campaign_id, $qty)
	{
		$type = self::$app_types[$this->app_id];
		$q = "SELECT id, facebook_user_id FROM user_content WHERE campaign_id = $campaign_id and category = '$type' AND (winner >= 0 OR winner IS NULL) ORDER BY votes DESC LIMIT $qty";
		$rs = $this->db->query($q)->result();
		
		//print_r($rs);
		$position = 0;
		foreach($rs as $content)
		{
			$position++;
			$q = "UPDATE user_content SET winner = $position WHERE id = " . $content->id;
			$this->db->query($q);
		}
		
		return $this->get_winners_list($campaign_id);
	}
		
	public function get_winners_list($campaign_id)
	{
		$type = self::$app_types[$this->app_id];
		
		$q = "SELECT fbu.*, uc.votes FROM facebook_user fbu LEFT JOIN user_content uc on fbu.facebook_user_id = uc.facebook_user_id WHERE uc.winner > 0  AND campaign_id = $campaign_id and category = '$type' ORDER BY uc.winner";
		$rs = $this->db->query($q)->result();
		
		return $rs;
	}
	
	public function export_users($campaign_id, $mode)
	{
		switch($mode)
		{
			case 'xls':
				return $this->export_users_xls($campaign_id);
				break;
		}
	}
	
	protected function export_users_xls($campaign_id)
	{
		$type = self::$app_types[$this->app_id];
		$this->load->library('excel/excel');
		$excel = new Excel($type.'_campaign_'.$campaign_id.'_users');
		
		// make a stylesheet with facebook user data
		$this->load->model('facebook_user_model');
		$fb_user = new Facebook_user_model();
		$users = $fb_user->get_campaign_users($campaign_id);
		$sheet = new Sheet(lang_line('report_sheet_facebook_users',false).' ('.count($users).')');
		
		$sheet->addColumn(new Columns(160));
		$sheet->addColumn(new Columns(160));
		$sheet->addColumn(new Columns(100));
		$sheet->addColumn(new Columns(100));
		$sheet->addColumn(new Columns(100));
		$sheet->addColumn(new Columns(350));
		$sheet->addColumn(new Columns(100));
		$sheet->addColumn(new Columns(200));
		$sheet->addColumn(new Columns(80));
		
		// headers 
		$row = new Row();
		$row->addCell(new Cell(new CellTypeString(),lang_line('report_header_facebook_user_id',false)));
		$row->addCell(new Cell(new CellTypeString(),lang_line('report_header_screen_name',false)));
		$row->addCell(new Cell(new CellTypeString(),lang_line('report_header_first_name',false)));
		$row->addCell(new Cell(new CellTypeString(),lang_line('report_header_middle_name',false)));
		$row->addCell(new Cell(new CellTypeString(),lang_line('report_header_last_name',false)));
		$row->addCell(new Cell(new CellTypeString(),lang_line('report_header_link',false)));
		$row->addCell(new Cell(new CellTypeString(),lang_line('report_header_birthday',false)));
		$row->addCell(new Cell(new CellTypeString(),lang_line('report_header_email',false)));
		$row->addCell(new Cell(new CellTypeString(),lang_line('report_header_verified',false)));
		
		$sheet->addRow($row);
		
		foreach($users as $user)
		{
			$row = new Row();
			$row->addCell(new Cell(new CellTypeString(),$user->facebook_user_id));
			$row->addCell(new Cell(new CellTypeString(),$user->name));
			$row->addCell(new Cell(new CellTypeString(),$user->first_name));
			$row->addCell(new Cell(new CellTypeString(),$user->middle_name));
			$row->addCell(new Cell(new CellTypeString(),$user->last_name));
			$row->addCell(new Cell(new CellTypeString(),$user->link));
			$row->addCell(new Cell(new CellTypeString(),$user->birthday != '0000-00-00' ? date(lang_line('m-d-Y',false),strtotime($user->birthday)) : ''));
			$row->addCell(new Cell(new CellTypeString(),$user->email));
			$row->addCell(new Cell(new CellTypeString(),$user->verified));
			
			$sheet->addRow($row); 
		}
		
		$excel->addSheet($sheet);
		
		// if applies, make a stylesheet with contest data
		list($headers, $data) = $this->extract_campaign_user_data($campaign_id);
		if(count($data))
		{
			$sheet = new Sheet(lang_line('report_sheet_campaign_user_content',false).' ('.count($data).')');
			$row = new Row();
			foreach($headers as $header)
			{
				$sheet->addColumn(new Columns(160));
				$row->addCell(new Cell(new CellTypeString(),$header));
			}
			$sheet->addRow($row);
			
			foreach($data as $content)
			{
				$row = new Row();
				foreach($content as $field)
				{
					$row->addCell(new Cell(new CellTypeString(),$field));
				}
				$sheet->addRow($row);
			}
			$excel->addSheet($sheet);
		}
		
		// make a stylesheet with the winners
		$winners = $this->get_winners_list($campaign_id);
		if(count($winners))
		{
			$sheet = new Sheet(lang_line('report_sheet_winners',false).' ('.count($winners).')');
			$sheet->addColumn(new Columns(160));
			$sheet->addColumn(new Columns(160));
			$sheet->addColumn(new Columns(160));
			$sheet->addColumn(new Columns(160));
			
			// headers 
			$row = new Row();
			$row->addCell(new Cell(new CellTypeString(),lang_line('report_header_facebook_user_id',false)));
			$row->addCell(new Cell(new CellTypeString(),lang_line('report_header_screen_name',false)));
			$row->addCell(new Cell(new CellTypeString(),lang_line('report_header_email',false)));
			if($this->app_winners_extract_mode == 'vote') $row->addCell(new Cell(new CellTypeString(),lang_line('report_header_votes',false)));
			$sheet->addRow($row);
			
			foreach($winners as $winner)
			{
				$row = new Row();
				$row->addCell(new Cell(new CellTypeString(), $winner->facebook_user_id));
				$row->addCell(new Cell(new CellTypeString(), $winner->name));
				$row->addCell(new Cell(new CellTypeString(), $winner->email));
				if($this->app_winners_extract_mode == 'vote')
				{
					$row->addCell(new Cell(new CellTypeString(), $winner->votes));
				}
				
				$sheet->addRow($row);
			}
			$excel->addSheet($sheet);
		}
		
		// if applies, make a stylesheet with user comments
		$this->load->model('user_content_model');
		$user_content = new User_content_model();
		$rs = $user_content->get_campaign_content($campaign_id, 'comment');
		if(count($rs))
		{
			$sheet = new Sheet(lang_line('report_sheet_comments',false).' ('.count($rs).')');
			$sheet->addColumn(new Columns(160));
			$sheet->addColumn(new Columns(160));
			$sheet->addColumn(new Columns(160));
			$sheet->addColumn(new Columns(160));
			
			// headers 
			$row = new Row();
			$row->addCell(new Cell(new CellTypeString(),lang_line('report_header_facebook_user_id',false)));
			$row->addCell(new Cell(new CellTypeString(),lang_line('report_header_screen_name',false)));
			$row->addCell(new Cell(new CellTypeString(),lang_line('report_header_comment',false)));
			$row->addCell(new Cell(new CellTypeString(),lang_line('report_header_date',false)));
			$sheet->addRow($row);
			
			foreach($rs as $comment)
			{
				$row = new Row();
				$row->addCell(new Cell(new CellTypeString(), $comment->facebook_user_id));
				$row->addCell(new Cell(new CellTypeString(), $comment->name));
				$row->addCell(new Cell(new CellTypeString(), $comment->content));
				$row->addCell(new Cell(new CellTypeString(), date(lang_line('m-d-Y',false).' H:i:s', strtotime($comment->created_at))));
				$sheet->addRow($row);
			}
			$excel->addSheet($sheet);
		}

		$excel->displayExcelDocument();
	}
	
	// override on children
	protected function extract_campaign_user_data($campaign_id){return array();}
}