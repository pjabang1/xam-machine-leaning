<?php

namespace Xam\Calculator;

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

class QuartileCalculator implements Calculator {

    protected $data;

    public function calculate($array) {
        $this->setData($array);
        
        return array(
            'Q1' => $this->getPercentile(25),
            'Q2' => $this->getPercentile(50),
            'Q3' => $this->getPercentile(75)
        );
    }

    /**
     * 
     * @return type
     */
    public function getData() {
        return $this->data;
    }

    /**
     * 
     * @param type $data
     * @return \Xam\Calculator\MeanCalculator
     */
    public function setData($data) {
        sort($data);
        $this->data = $data;
        return $this;
    }

    public function getPercentile($p) {
        $count = count($this->getData());

        $data = $this->getData();

        $obsidx = $p * ($count + 1) / 100;

        if (intval($obsidx) == $obsidx) {

            return $data[($obsidx - 1)];
        } elseif ($obsidx < 1) {

            return $data[0];
        } elseif ($obsidx > $count) {

            return $data[($count - 1)];
        } else {

            $left = floor($obsidx - 1);

            $right = ceil($obsidx - 1);

            return ($data[$left] + $data[$right]) / 2;
        }
    }

}

?>
