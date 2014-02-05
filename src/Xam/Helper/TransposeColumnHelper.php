<?php

namespace Xam\Helper;

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

class TransposeColumnHelper {

    /**
     * 
     * @param type $rows
     * @return type
     */
    function transpose($rows) {
        $columns = array();
        for ($i = 0; $i < count($rows); $i++) {
            for ($k = 0; $k < count($rows[$i]); $k++) {
                $columns[$k][$i] = $rows[$i][$k];
            }
        }
        return $columns;
    }

}

?>
