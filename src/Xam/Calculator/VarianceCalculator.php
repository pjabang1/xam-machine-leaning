<?php

namespace Xam\Calculator;

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

class VarianceCalculator implements Calculator {

    /**
     *
     * @var Xam\Calculator\Calculator 
     */
    protected $meanCalculator;

    /**
     * 
     * @param type $array
     * @return double
     */
    function calculate($array) {
        $mean = $this->getMeanCalculator()->calculate($array);

        $sum_difference = 0;
        $n = count($array);

        for ($i = 0; $i < $n; $i++) {
            $sum_difference += pow(($array[$i] - $mean), 2);
        }

        $variance = $sum_difference / $n;
        return $variance;
    }
    
    public function getMeanCalculator() {
        return $this->meanCalculator;
    }

    /**
     * 
     * @param \Xam\Calculator\Xam\Calculator\Calculator $meanCalculator
     * @return \Xam\Calculator\MeanCalculator
     */
    public function setMeanCalculator(Calculator $meanCalculator) {
        $this->meanCalculator = $meanCalculator;
        return $this;
    }
   

}

?>
