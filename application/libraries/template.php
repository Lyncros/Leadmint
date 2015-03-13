<?php  if (!defined('BASEPATH')) exit('No direct script access allowed');
/**
 * CodeIgniter Templates Class
 *
 * Inspired on Philip Sturgeon Template Class
 *
 */

class Template
{
	protected $_module = '';
	protected $_controller = '';
	protected $_method = '';
	
	protected $_slots = array();
	
	protected $_ci = FALSE;
	
	protected static $_theme = '';
	protected $_layout = FALSE;
	
	private $_title = '';
    private $_metadata = array();
    private $_body = '';
    private $_breadcrumbs = array();
	private $_body_class = '';
	private $_main_class = '';
	
	private $data = array();
	
	private $folders = array();
	
	// Seconds that cache will be alive for
    private $cache_lifetime = 0;//7200;
	
	
	function __construct($config=array())
	{
		if (!empty($config))
		{
			$this->initialize($config);
		}
		$this->_ci = &get_instance();


		// Work out the controller and method
    	if( method_exists( $this->_ci->router, 'fetch_module' ) )
    	{
    		$this->_module 	= $this->_ci->router->fetch_module();
    	}

        $this->_controller	= $this->_ci->router->fetch_class();
        $this->_method 		= $this->_ci->router->fetch_method();
        
        $this->folders['css'] = config_item('template_css_dir');
        $this->folders['js'] = config_item('template_js_dir');
        $this->folders['img'] = config_item('template_img_dir');

	}
	
	function initialize($config = array())
	{
		foreach ($config as $key => $val)
		{
			$this->{'_'.$key} = $val;
		}
		
		if(empty($this->_theme_locations))
		{
			$this->_theme_locations = array('html/' => '../../html/');
		}
	}
	
	function render($view='',$data=array(), $return = FALSE)
	{
		
		$this->data = array_merge($this->data,(array)$data);
		
		$template = new stdClass();
		$template->title = $this->_title;
		$template->breadcrumbs = $this->get_breadcrumbs();
		$template->metadata = implode("\n\t\t", $this->_metadata);
		$template->body_class = $this->_body_class ? $this->_body_class : $this->_layout;
		$template->main_class = $this->_main_class;
		$this->data['template'] = $template;
		
		foreach($this->_slots as $slot => $data)
		{
			$template->$slot = $this->_get_slot($data);
		}
		
		if($view)
		{
			$this->_body = $this->view($view,null,false);
		}
		
		
		
		// Disable sodding IE7's constant cacheing!!
        $this->_ci->output->set_header('Expires: Sat, 01 Jan 2000 00:00:01 GMT');
        $this->_ci->output->set_header('Cache-Control: no-store, no-cache, must-revalidate');
        $this->_ci->output->set_header('Cache-Control: post-check=0, pre-check=0, max-age=0');
        $this->_ci->output->set_header('Last-Modified: ' . gmdate( 'D, d M Y H:i:s' ) . ' GMT' );
        $this->_ci->output->set_header('Pragma: no-cache');

        // Let CI do the caching instead of the browser
        $this->_ci->output->cache( $this->cache_lifetime );
        
		$output = '';
		if($this->_layout)
		{
			$template->body = $this->_body;
			$output = $this->view($this->_layout,null,true);
			
		}
		else
		{
			$output = $this->_body;
		}
		
		// Want it returned or output to browser?
        if(!$return)
        {
            // Send it to output
            $this->_ci->output->set_output($output);
        }
		echo($output);
        return $output;
		
	}
	
	function _get_slot($items=array())
	{
		$ret = '';
		
		foreach ($items as $item)
		{
			$ret .= is_array($item) ? $this->_get_component($item) : $this->view($item, null, false);
		}
		return $ret;
	}
	
	function _get_component($args)
	{
		$component = $args[0];
		$method = $args[1];
		$data = isset($args[2]) ? $args[2] : '';
		
		return self::component($component,$method,$data,FALSE);
	}
	
	function get_breadcrumbs()
	{
		if(!count($this->_breadcrumbs)) return '';
		
		$view = 'breadcrumbs';
		$breadcrumbs = array('breadcrumbs'=>$this->_breadcrumbs);
		
		if(!($theme_view = self::_view($view))) $theme_view = $view;
		
		return $this->_ci->load->view( $theme_view, $breadcrumbs, TRUE );
	}

	public function view($view,$data=array(), $no_merge=false)
	{
		
		$data = is_array($data) ? ($no_merge ? $data : array_merge($this->data,$data)) : $this->data;

		if(!($theme_view = self::_view($view))) $theme_view = $view;
		return $this->_ci->load->view( $theme_view, $data, TRUE );
	}
	
	public static function get_view($view, $data, $theme = '')
	{
		$ci = &get_instance();
		if($theme) self::$_theme = $theme;
		if(!($theme_view = self::_view($view))) $theme_view = $view;
		
		return $ci->load->view( $theme_view, $data, TRUE );
	}
	
	
	
	/* seters / getters */
	public function theme($theme = '')
	{
		self::$_theme = $theme;
		return $this;
	}

	public function layout($view = '')
	{
		$this->_layout = $view;
		return $this;
	}
	
	public function title($title)
	{
		$this->_title = $title;
		return $this;
	}
	public function breadcrumb($name, $uri = '')
    {
    	$this->_breadcrumbs[] = array('name' => $name, 'uri' => $uri );
        return $this;
    }
	public function body($body)
	{
		$this->_body = $body;
		return $this;
	}
	public function body_class($class)
	{
		$this->_body_class = $class;
		return $this;
	}
	public function main_class($class)
	{
		$this->_main_class = $class;
		return $this;
	}
	
	public function metadata($name, $content, $type = 'meta', $prepend = FALSE)
    {
        $name = htmlspecialchars(strip_tags($name));
        $content = htmlspecialchars(strip_tags($content));

        // Keywords with no comments? ARG! comment them
        if($name == 'keywords' && !strpos($content, ','))
        {
        	$content = preg_replace('/[\s]+/', ', ', trim($content));
        }

        switch($type)
        {
        	case 'meta':
        		$meta = '<meta name="'.$name.'" content="'.$content.'" />';
        	break;

        	case 'link':
        		$meta = '<link rel="'.$name.'" href="'.$content.'" />';
        	break;
        }

    	$this->add_metadata($meta,$prepend);

        return $this;
    }
    
    public function add_metadata($line,$prepend=FALSE)
    {
    	if(is_array($line))
    	{
    		while(count($line))
    		{
    			$_line = array_shift($line);
    			$this->add_metadata($_line,$prepend);
    		}
    	}
    	else
    	{
    		$prepend ? array_unshift($this->_metadata, $line) : $this->_metadata[] = $line;
        	
    	}
    	return $this;
    }
    
	public function append($slot,$view='')
	{
		
		$view || $view = $slot;
		
		$this->init_slot($slot);
		$this->_slots[$slot][] = $view;
		
		return $this;
	}
	
	public function prepend($slot,$view)
	{
		$this->init_slot($slot);
		array_unshift($this->_slots[$slot],$view);
		
		return $this;
	}
	
	public function reset($slot)
	{
		$this->_slots[$slot] = '';
		unset($this->_slots[$slot]);
		return $this;
	}
	
	/* helpers */
	private function _thematize($view)
	{
		$theme = self::$_theme ? self::$_theme . '/' : '';
		$view = array(
			'relative' => '../../html/'.$theme.$view,
			'absolute' =>'html/'.$theme.$view
		);
		return (object) $view;
	}
	
	private function _view($view)
	{	
		// is the view overriden on the theme ?
		$test = self::_thematize(self::_ext($view,'html'));
		if(file_exists($test->absolute)) return $test->relative;
		
		// try the default extension
		$test = self::_thematize(self::_ext($view));
		if(file_exists($test->absolute)) return $test->relative;
		
		return  FALSE;
	}
	
	private function _ext($file,$ext='')
	{
		$extension = $ext ? '.'.$ext : EXT;
		return $file . ( pathinfo($file, PATHINFO_EXTENSION) ?  '' : $extension );
	}
	
	private function init_slot($slot)
	{
		if(!isset($this->_slots[$slot]))
		{
			$this->_slots[$slot] = array();
		}
	}
	

	
	
	//************* ASSET MANAGEMENT ********************//
	private function _get_asset_path($path,$module=NULL)
	{	
		if($module) {
			$path = 'application/modules/'.$module.'/'.$path;
		}
		else
		{
			$path = 'html/'.$path;
		}
		
		return base_url().$path;
	}
	private function _parse_asset_html($attributes = NULL)
	{
		$attribute_str = '';

		if(is_string($attributes))
		{
			$attribute_str = $attributes;
		}
		
		else if(is_array($attributes) || is_object($attributes))
		{
			foreach($attributes as $key => $value)
			{
				$attribute_str .= ' '.$key.'="'.$value.'"';
			}
		}
	
		return $attribute_str;
	}
	
	function css($path,$module=NULL,$attributes=NULL,$prepend=FALSE)
	{
		$css = $this->_css($path,$module,$attributes);
		
		$this->add_metadata($css,$prepend);
	}
	static function _css($path,$module=NULL,$attributes=NULL)
	{
		$attribute_str = self::_parse_asset_html($attributes);

		if(!preg_match('/rel="([^\"]+)"/', $attribute_str))
		{
			$attribute_str .= ' rel="stylesheet"';
		}
		
		return '<link href="'.self::_get_asset_path($path, $module).'" type="text/css"'.$attribute_str.' />'."\n";
	}
	
	function js($path, $module = NULL,$prepend=FALSE)
	{
		$this->add_metadata($this->_js($path,$module));
	}
	
	static function _js($path,$module=NULL)
	{
		$js = '<script type="text/javascript" src="'. self::_get_asset_path($path, $module).'"></script>'."\n";
		return $js;
	}
}

// helper functions

function component ($component,$method,$data=array(),$output=TRUE)
{
	Template::component($component,$method,$data=array(),$output=TRUE);
}
function widget ()
{
	Template::widget();
}
function css($path,$module=NULL,$attributes=NULL)
{
	echo Template::_css($path,$module,$attributes);
}
function js($path,$module=NULL)
{
	echo Template::_js($path,$module);
}