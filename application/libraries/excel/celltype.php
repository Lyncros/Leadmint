<?php
require_once 'celltypedatetime.php';
require_once 'celltypenumber.php';
require_once 'celltypestring.php';

abstract class CellType{
        
    /**
     * Type Cell
     *
     * @var string $resourceType
     */
    protected $cellType;
    
    public function __construct($cellType){
        $this->cellType = $cellType;
    }
    /**
     * Return the type of resource
     *
     * @return string
     */
    final public function getType(){
        return $this->cellType;
    }    
    
}
?>