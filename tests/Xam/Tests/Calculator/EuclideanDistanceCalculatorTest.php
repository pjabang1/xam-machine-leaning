<?php
namespace Xam\Tests\Calculator;
/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */
use Xam\Calculator\EuclideanDistanceCalculator;

class EuclideanDistanceCalculatorTest extends \PHPUnit_Framework_TestCase {
    
    
    public function testEuclideanDistanceCalculator() {
        $calculator = new EuclideanDistanceCalculator();
        
        $data = array(
            array(1, 5, 7, 0),
            array(1, 8, 8, 6),
        );
        
        $this->assertEquals(6.7823299831253, $calculator->calculate($data));
        
        $data = array(
            array(1, 5, 7, 0),
            array(1, 5, 7, 6),
        );
        
        $this->assertEquals(6, $calculator->calculate($data));
    }
}
?>
