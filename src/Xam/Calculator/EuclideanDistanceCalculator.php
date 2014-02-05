<?php
namespace Xam\Calculator;
/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

class EuclideanDistanceCalculator implements Calculator {

    /**
     * 
     * @param type $array
     * @return double
     */
    function calculate($array) {
        
        $a = $array[0];
        $b = $array[1];
        
        if (count($a) != count($b))
            return false;

        $distance = 0;
        for ($i = 0; $i < count($a); $i++) {
            $distance += pow($a[$i] - $b[$i], 2);
        }

        return sqrt($distance);
    }

}

?>
