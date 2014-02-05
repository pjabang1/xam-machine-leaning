<?php

namespace Xam\Calculator;

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 * 
 * http://en.wikipedia.org/wiki/Standard_deviation
 */

class StandardDeviationCalculator implements Calculator {

    protected $sample = false;

    /**
     * 
     * @param type $array
     * @return double
     */
    public function calculate($array) {
        $sum = array_sum($array);
        $count = count($array);
        $fMean = $sum / $count;
        $fVariance = 0.0;
        foreach ($array as $i) {
            $fVariance += pow($i - $fMean, 2);
        }
        $fVariance /= ($this->getSample() ? $count - 1 : $count );
        return (float) sqrt($fVariance);
    }

    public function getSample() {
        return $this->sample;
    }

    /**
     * 
     * @param boolean $sample
     * @return \Xam\Calculator\StandardDeviationCalculator
     */
    public function setSample($sample) {
        $this->sample = $sample;
        return $this;
    }

}

?>