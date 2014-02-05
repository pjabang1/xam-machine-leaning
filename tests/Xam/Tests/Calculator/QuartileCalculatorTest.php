<?php

namespace Xam\Tests\Calculator;

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

use Xam\Calculator\QuartileCalculator;

class QuartileCalculatorTest extends \PHPUnit_Framework_TestCase {

    public function testQuartileCalculator() {
        $calculator = new QuartileCalculator();

        $data = array(1, 8, 8, 3, 3, 4, 5, 6, 6, 7);
        $expected = array(
            'Q1' => 3,
            'Q2' => 5.5,
            'Q3' => 7.5
        );


        $this->assertEquals($expected, $calculator->calculate($data));
    }

}

?>
