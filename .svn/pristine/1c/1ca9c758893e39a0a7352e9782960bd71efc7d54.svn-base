<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

class MY_Model {

		
	protected $table = NULL;
	protected $fields = array();
	protected $_validation_rules = array();
	protected $triggers = array();
	protected $data = array();
	public $query_records = array();
	protected $errors = array();
	
	public function __construct()
	{
		$this->data = new stdClass();
		// initialize dynamic model fields
		foreach($this->fields as $field_name => $options)
		{
			$this->data->{$field_name} = isset($options['default']) ? $options['default'] : '';
		}
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
	
	// wrapper for the db object
	public function __call($method, $arguments)
	{
		// if method called belongs to the db class...
		if(method_exists( $this->db, $method) ) 
		{
			$ret =  call_user_func_array( array($this->db, $method), $arguments);
			// implement method chaining
			return ( (is_object($ret) AND get_class($ret) == 'CI_DB_mysql_driver') ? $this : $ret);
		}
		else
		{
			throw new Exception('Undefined method DB::' . $method . '() called');
		}
	}

	// populates de data object from an array
	// which could be $_POST
	public function hydrate($row)
	{
		if(empty($row)) return $this;
		
		foreach($row as $key => $value)
		{
			if( ! property_exists($this->data, $key)) continue;
			$this->data->{$key} = $value;
		}
		
		return $this;
	}
	public function post_hydrate()
	{
		return $this->hydrate($this->input->post(null,true));
	}
	
	// check the model holds valid db data
	public function valid()
	{
		return (bool) $this->data->id;
	}
	
	// dump function for debugging
	public function dump()
	{
		echo('<pre>');
		var_dump($this->data);
		echo('</pre>');
	}
	
	public function to_json()
	{
		return json_encode($this->data);
	}
	public function from_json($data)
	{
		$this->data = json_decode($data);
	}
	
	function data ()
	{
		return $this->data;
	}
	
	public function records()
	{	
		return $this->query_records;
	}
	
	// returns a db result query object
	// and stores the result in the query_records variable
	public function get()
	{
		$query = $this->db->get($this->table);
		$this->query_records = $query->result();
		
		return $query;
	}
	
	// accepts a table id value or an array of ids
	// if no id is provided, tries to use the data->id value
	// returns the db row and populates the model with the data
	public function by_id($id = null)
	{
		$id || $id = $this->data->id;
		if(empty($id)) return $this;
		
		$func = is_array($id) ? 'where_in' : 'where';
		$this->db->$func($this->table.'.id',$id);
		
		$row = $this->db->get($this->table)->row();
		
		$this->hydrate($row);
		return $row;
	}
	
	public function get_records()
	{
		$this->get();
		return $this->query_records;
	}
	
	public function get_row($hydrate = true)
	{
		$this->db->limit(1);
		$row = $this->db->get($this->table)->row();
		if($hydrate) {			
			$this->hydrate($row);
		}
		return $row;
	}
	
	public function count()
	{
		return $this->db->count_all_results($this->table);
	}
	
	
	public function count_table()
	{
		return $this->db->count_all($this->table);
	}
	
	// saves the model data to db
	// handles update & insert as $id is set on the model
	// returns the field id
	public function save()
	{	
		$save_data = $this->data;
		$id = $this->data->id;
		unset($save_data->id);
		
		if($id)
		{
			if(isset($save_data->created_at)) unset($save_data->created_at);
			if(array_key_exists('updated_at', $this->fields)) $save_data->updated_at = date('Y-m-d H:i:s');
			$this->db->where('id',$id)->update($this->table,$save_data);
		}
		else
		{
			if(array_key_exists('created_at', $this->fields)) $save_data->created_at = date('Y-m-d H:i:s');
			if(array_key_exists('updated_at', $this->fields)) $save_data->updated_at = date('Y-m-d H:i:s');
			$this->db->insert($this->table,$save_data);
			$id = $this->db->insert_id();
		}
		
		$this->data->id = $id;
		return $id;
	}
	
	// deletes rows and triggers delete on related models
	public function delete($id = NULL)
	{
		if($id)
		{
			$ids = is_array($id) ? $id : array($id);
			$this->db->where_in('id',$ids);
		}
		else
		{
			$this->db->where('id',$this->id);
		}
		$this->db->delete($this->table);
		//echo($this->db->last_query());
		
		$foreign_table = $this->table;
		foreach($this->triggers as $mod=>$foreign_key)
		{
			$this->load->model($mod);
			list($module_name,$model_name) = explode('/',$mod);
			$model = new $model_name();
			$rs = $model->select('id')->where_in($foreign_key,$ids)->get_records();
			
			$foreign_ids =array();
			foreach($rs as $row)
			{
				$foreign_ids[] = $row->id;
			}
			
			if(count($foreign_ids))
			{
				$model->delete($foreign_ids);
			}	
		}
	}
	
	public function load_related($model)
	{
		if(! class_exists($model))
		{
			$ci = &get_instance();
			$ci->load->model($model);
		}
		return new $model();
	}
	
	public function insert($data)
	{
		return $this->db->insert($this->table,$data);
	}
	
	public function update($id,$data)
	{
		return $this->db->where('id',$id)->update($this->table,$data);
	}
	
	public function get_paged($page = 1, $page_size = 50)
	{
		
		// first, duplicate this query, so we have a copy for the query
		$count_db = clone($this->db);

		// never less than 1
		$page = max(1, intval($page));
		$offset = $page_size * ($page - 1);
		
		// for performance, we clear out the select AND the order by statements,
		// since they aren't necessary and might slow down the query.
		$count_db->ar_select = NULL;
		$count_db->ar_orderby = NULL;
		$total = $count_db->count_all_results($this->table);
		//echo($count_db->last_query());
		
		// common vars
		$last_row = $page_size * floor($total / $page_size);
		$total_pages = ceil($total / $page_size);

		if($offset >= $last_row)
		{
			// too far!
			$offset = $last_row;
			$page = $total_pages;
		}

		$this->db->limit($page_size, $offset);
		
		$this->query_records = $this->db->get($this->table)->result();
		
		/*
if(count($this->query_records))
		{
			$row = clone($this->query_records[0]);
		}
*/
		
		$this->paged = new stdClass();
		$this->paged->page_size = $page_size;
		$this->paged->items_on_page = count($this->query_records);
		$this->paged->current_page = $page;
		$this->paged->current_row = $offset;
		$this->paged->total_rows = $total;
		$this->paged->last_row = $last_row;
		$this->paged->total_pages = $total_pages;
		$this->paged->has_previous = $offset > 0;
		$this->paged->previous_page = max(1, $page-1);
		$this->paged->previous_row = max(0, $offset-$page_size);
		$this->paged->has_next = $page < $total_pages;
		$this->paged->next_page = min($total_pages, $page+1);
		$this->paged->next_row = min($last_row, $offset+$page_size);
		
		return $this;	
	}
	
	public function value($field,$value)
	{	
		$default_func = $field.'_default';
		$value = method_exists($this,$default_func) ? $this->$default_func() : $value;
		$format_func = $field.'_format';
		$value = method_exists($this,$format_func) ? $this->$format_func($value) : $value;
		
		return $value;
	}
		
	public function rules($field='')
	{
		if($field) return $this->_validation_rules[$field];
		
		$ret = array();
		foreach($this->_validation_rules as $field_name=>$rules)
		{
			$ret[]=  array('field'   => $field_name,'rules'   => $rules);
		}
		return $ret;
	}
	
	public function validate($rules = null)
	{
		$rules || $rules = $this->rules();
		
		$ci = &get_instance();
		$ci->load->library('form_validation');
		$ci->form_validation->set_rules($rules);
		
		$valid = $ci->form_validation->run();
		if($valid) $this->post_hydrate();
		return $valid;
	}
	
	public function toggle($field,$id = null)
	{
		if(!$id)
		{
			$this->$field = !$this->$field;
			$this->save();
		}
		else
		{
			$q = "UPDATE {$this->table} SET $field = ! $field WHERE id=$id";
			$this->db->query($q);
		}
			
	}
	
	
}