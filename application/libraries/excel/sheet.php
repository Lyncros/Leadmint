<?php

class Sheet{
    
    /**
     * Name of sheet
     *
     * @var string
     */
    public $sheetName;
    
    /**
     * Columns for sheet
     *
     * @var Columns
     */
    public $columns;
    
    /**
     * Rows for sheet
     *
     * @var Rows
     */
    public $rows;
    
    /**
     * Set sheet Name
     *
     * @param string $sheetName
     */
    public function __construct($sheetName){
        $this->sheetName = $sheetName;
    }
   
    /**
     * Add column to sheet
     *
     * @param Columns $columndObj
     */
    public function addColumn(Columns $columndObj){

        $this->columns[] = $columndObj;
        
    }
   
    /**
     * Add Rows to sheet
     *
     * @param Row $rowObj
     */
    public function addRow(Row $rowObj){
        
        $this->rows[] = $rowObj;
                
    }    
    
    
    
    
    
    
    
}
?>