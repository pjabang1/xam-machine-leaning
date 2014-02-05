<?php

namespace Xam\MachineLearning\Algorithm;

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

// http://stackoverflow.com/questions/2303510/recommended-anomaly-detection-technique-for-simple-one-dimensional-scenario

class IQROutlierTestAlgorithm {

    /**
     *
     * @var type 
     */
    protected $data;

    /**
     *
     * @var boolean 
     * 
     * 
     */
    protected $mild;

    /**
     *
     * @var \Xam\Calculator\Calculator  
     */
    protected $quartileCalculator;

    public function getData() {
        return $this->data;
    }

    public function setData($data) {
        $this->data = $data;
        return $this;
    }

    /**
     * 
     * @param type $value
     */
    public function isAnomaly($value) {

        $quartiles = $this->getQuartileCalculator()->calculate($this->getData());
        $q25 = $quartiles['Q1'];
        $q75 = $quartiles['Q3'];

        $iqr = $q75 - $q25;         // inter-quartile range
        
        if (true === $this->getMild()) {
            return abs($value - $q75) > 1.5 * $iqr; // then x is a mild outlier
        }
        return abs($value - $q75) > 3.0 * $iqr; // then x is an extreme outlier

    }

    /**
     * 
     * @return type
     */
    public function getQuartileCalculator() {
        return $this->quartileCalculator;
    }

    /**
     * 
     * @param \Xam\Calculator\Calculator $quartileCalculator
     * @return \Xam\MachineLearning\Algorithm\IQROutlierTestAlgorithm
     */
    public function setQuartileCalculator(\Xam\Calculator\Calculator $quartileCalculator) {
        $this->quartileCalculator = $quartileCalculator;
        return $this;
    }

    public function getMild() {
        return $this->mild;
    }

    /**
     * 
     * @param boolean $mild
     * 
     * true is mild
     * false is extreme 
     * 
     * @return \Xam\MachineLearning\Algorithm\IQROutlierTestAlgorithm
     */
    public function setMild($mild) {
        $this->mild = $mild;
        return $this;
    }

}

?>
