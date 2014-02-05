<?php

namespace Xam\MachineLearning\Algorithm;

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

// http://stackoverflow.com/questions/2303510/recommended-anomaly-detection-technique-for-simple-one-dimensional-scenario

class ThreeSigmaRuleAlgorithm {

    /**
     *
     * @var type 
     */
    protected $data;

    /**
     *
     * @var \Xam\Calculator\Calculator  
     */
    protected $meanCalculator;

    /**
     *
     * @var \Xam\Calculator\Calculator 
     */
    protected $standardDeviationCalculator;

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
        $mean = $this->getMeanCalculator()->calculate($this->getData());
        $standardDeviation = $this->getStandardDeviationCalculator()->calculate($this->getData());
        return abs($value - $mean) > 3 * $standardDeviation;
    }

    /**
     * 
     * @return type
     */
    public function getMeanCalculator() {
        return $this->meanCalculator;
    }

    /**
     * 
     * @param \Xam\Calculator\Calculator $meanCalculator
     * @return \Xam\MachineLearning\Algorithm\IQROutlierTestAlgorithm
     */
    public function setMeanCalculator(\Xam\Calculator\Calculator $meanCalculator) {
        $this->meanCalculator = $meanCalculator;
        return $this;
    }

    /**
     * 
     * @return type
     */
    public function getStandardDeviationCalculator() {
        return $this->standardDeviationCalculator;
    }

    /**
     * 
     * @param \Xam\Calculator\Calculator $standardDeviationCalculator
     * @return \Xam\MachineLearning\Algorithm\IQROutlierTestAlgorithm
     */
    public function setStandardDeviationCalculator(\Xam\Calculator\Calculator $standardDeviationCalculator) {
        $this->standardDeviationCalculator = $standardDeviationCalculator;
        return $this;
    }

}

?>
