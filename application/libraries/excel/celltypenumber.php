<?php
/**
 * Generate object CellType from type number
 * @author Pagnone Pablo
 * @version 0.7
 */
class CellTypeNumber extends CellType {
    
    const CELL_TYPE = 'Number';
    
    public function __construct(){
        parent::__construct(self::CELL_TYPE);
    }
}
?>