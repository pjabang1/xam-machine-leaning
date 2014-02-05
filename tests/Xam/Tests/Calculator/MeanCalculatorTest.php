<?php
namespace Xam\Tests\Calculator;
/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */
use Xam\Calculator\MeanCalculator;

class MeanCalculatorTest extends \PHPUnit_Framework_TestCase {
    
    
    public function testMeanCalculator() {
        $calculator = new MeanCalculator();
        
        $data = array(1, 5, 7, 8);
        
        $this->assertEquals(5.25, $calculator->calculate($data));
        
       
    }
}
?>
