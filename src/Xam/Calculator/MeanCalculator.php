<?php
namespace Xam\Calculator;
/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

class MeanCalculator implements Calculator {

    /**
     * 
     * @param type $array
     * @return double
     */
    function calculate($array) {
       return array_sum($array)/count($array);
    }

}

?>
