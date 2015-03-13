<?php if (!defined('BASEPATH')) exit('No direct script access allowed');
/**
* CSVReader Class
*
* $Id: csvreader.php 147 2007-07-09 23:12:45Z Pierre-Jean $
*
* Allows to retrieve a CSV file content as a two dimensional array.
* The first text line shall contains the column names.
*
* @author        Pierre-Jean Turpeau
* @link        http://www.codeigniter.com/wiki/CSVReader
* @modified		Santiago Far Suau May 2011
*/
class CSVReader {

    public $fields;        /** columns names retrieved after parsing */
    public $separator = ',';    /** separator used to explode each line */
    public $first_line_is_header = false;

    /**
     * Parse a text containing CSV formatted data.
     *
     * @access    public
     * @param    string
     * @return    array
     */
    function parse_text($p_Text) {
        $lines = explode("\n", $p_Text);
        return $this->parse_lines($lines);
    }

    /**
     * Parse a file containing CSV formatted data.
     *
     * @access    public
     * @param    string
     * @return    array
     */
    function parse_file($p_Filepath) {
        $temp_lines = file($p_Filepath); // file() uses \n to split files
       	$lines = array();
       	foreach($temp_lines as $line)
       	{
       		$lines = array_merge( explode("\r", $line), $lines); // make sure lines are not \r 
       	}
        
        return $this->parse_lines($lines);
    }
    /**
     * Parse an array of text lines containing CSV formatted data.
     *
     * @access    public
     * @param    array
     * @return    array
     */
    function parse_lines($p_CSVLines) {
        $content = array();
       
        foreach( $p_CSVLines as $line_num => $line ) {
        	
        	
            if( trim($line) != '' ) { // skip empty lines
            	
                $elements = explode($this->separator, $line);
				
				// initialize the headers
                if( $this->first_line_is_header ) { // the first line contains fields names
                    $this->fields = $elements;
                    next;
                } 
                else
                {
                	if( ! count($this->fields) ) // field names already set up
                	{
                		$i = 0;
	                	foreach($elements as $element)
	                	{
	                		$this->fields[] = 'f'.$i;
	                		$i++;
	                	}
                	}
                	
                }
                
                $item = array();
                foreach( $this->fields as $id => $field ) {
                    if( isset($elements[$id]) ) {
                        $item[$field] = $elements[$id];
                    }
                    else
                    {
                    	$item[$field] = '';
                    }
                }
                $content[] = $item;
            }
        }
        return count($content) ? $content : FALSE;
    }
    
    function create($lines = array(), $filename = null)
    {
    	$data = '';
    	foreach($lines as $line)
    	{
    		$data .= implode(',',$line)."\r\n";
    	}
    	
    	$ci = &get_instance();
    	if($filename)
    	{
    		$ci->load->helper('file');
    		write_file($filename,$data);
    	}
    }
    
    function download($lines = array(), $filename = null, $headers = null)
    {
    	$data = $headers ? implode(',',$headers)."\r\n" : '';
    	foreach($lines as $line)
    	{
    		$data .= implode(',',$line)."\r\n";
    	}
    	
    	
    	if($filename)
    	{
    		$ci = &get_instance();
    		$ci->load->helper('download');
    		force_download($filename, $data); 
    	}
    }
}
