<?php
namespace Xam\Tests\Calculator;
/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */
use Xam\Calculator\StandardDeviationCalculator;

class StandardDeviationCalculatorTest extends \PHPUnit_Framework_TestCase {
    
    /**
     * 
     */
    public function testStandardDeviationCalculator() {
        $calculator = new StandardDeviationCalculator();
        
        $data = array(321737, 271530, 328027, 310692, 321334, 333103, 330550, 314289, 335015, 349384, 323249, 307448, 291002, 275438);
        
        $this->assertEquals(22501.061311233, $calculator->setSample(true)->calculate($data));
       // $this->assertEquals(21682.565217431, $calculator->setSample(false)->calculate($data));
        
       
    }
}
?>
