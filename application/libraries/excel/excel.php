<?php
require_once 'sheet.php';
require_once 'columns.php';
require_once 'row.php';
require_once 'cell.php';
require_once 'celltype.php';

/**
 * This class generate an exportable excel file
 * 
 *<code>
 * 
 * //Example to use this class:
 * 
 * //Generate Object Excel                   
 * $excel = new Excel();
 * 
 * //Set author Excel :       
 * $excel->setAuthor("author example");         
 * 
 * //Generate Object Sheet                   
 * $sheet = new Sheet("name of sheet");
 * 
 * //Generate Object Columns to sheet        
 * $column = new Columns(200);
 * 
 * //Add Object columns to sheet             
 * $sheet->addColumn($column);
 * 
 * //Create Object Row                  
 * $row = new Row();
 * 
 * //Add objects cell to object row          
 * $row->addCell(new Cell(new CellTypeString(),"Data of cell"));
 * 
 * //Add row to sheet
 * $sheet->addRow($row); 
 * 
 * //Add sheet to excel
 * $excel->addSheet($sheet);
 * 
 * //Display Excel to export
 * $excel->displayExcelDocument();
 * 
 * 
 * </code>

 * 
 * @author Pagnone Pablo
 * @version 0.7
 */

class Excel{
    
    /**
     * This is the name of excel to export 
     *
     * @var string
     */
    protected $fileName ;
    
    /**
     * This is the author of excel to export 
     *
     * @var string
     */
    protected $author;
    
    /**
     * This is the date creation of excel to export 
     *
     * @var integer
     */
    protected $creationDate;    
    
    /**
     * This are the sheets from excel to export
     *
     * @var Sheet
     */
    protected $sheets;

    /**
     * Set filename and creationDate
     *
     * @param string $fileName
     */
    public function __construct($fileName=null){
        
        $this->fileName = $fileName;  
        $this->creationDate = time(); 
        
    }
    
    /**
     * Set author from excel
     *
     * @param string $author
     */
    public function setAuthor($author){
        
        $this->author = $author;        
        
    }    
    
    /**
     * Add new sheet to excel
     *
     * @param Sheet $sheet
     */
    public function addSheet(Sheet $sheet){
        $this->sheets[] = $sheet;
    }
    
    /**
     * Display excel
     *
     */   
    public function displayExcelDocument(){

        //Set Headers
        $this->setHeaders($this->fileName);
		
		$data['header'] = '<?xml version="1.0"?><?mso-application progid="Excel.Sheet"?>';
		$data['dataExcel'] = $this->sheets;
		$data['author'] = $this->author;
		$data['creationDate'] = $this->creationDate;
		
		$ci = &get_instance();
		echo $ci->load->view('excel',$data);
       
        //exit(0);
    }    
    
    /**
     * Set headers to excel 
     *
     * @param string $documentName
     */
    private function setHeaders($documentName){
        
        header("Content-Disposition: attachment; filename=\"$documentName.xls\"");       
        header("Content-Transfer-Encoding: binary");        
        header("Cache-Control: no-cache, must-revalidate, max-age=60");               
        header("content-type:application/msexcel; charset=ANSI");
                
    }
    

    
    
    
    
    
    
    
    
    
    
}
?>