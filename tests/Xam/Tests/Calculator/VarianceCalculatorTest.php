<?php
namespace Xam\Tests\Calculator;
/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */
use Xam\Calculator\MeanCalculator;
use Xam\Calculator\VarianceCalculator;

class VarianceCalculatorTest extends \PHPUnit_Framework_TestCase {
    
    
    public function testVarianceCalculator() {
        $calculator = new VarianceCalculator();
        $calculator->setMeanCalculator(new MeanCalculator());
        
        $data = array(1, 5, 7, 8);
        
        $this->assertEquals(7.1875, $calculator->calculate($data));
        
       
    }
}
?>
