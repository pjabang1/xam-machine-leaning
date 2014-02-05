<?php

namespace Xam\Tests\MachineLearning\Algorithm;

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

use Xam\Calculator\StandardDeviationCalculator;
use Xam\Calculator\MeanCalculator;
use Xam\MachineLearning\Algorithm\ThreeSigmaRuleAlgorithm;

class ThreeSigmaRuleAlgorithmTest extends \PHPUnit_Framework_TestCase {

    /**
     * 
     */
    public function testIsAnomaly() {
        $algorithm = new ThreeSigmaRuleAlgorithm();
        $algorithm->setMeanCalculator(new MeanCalculator())
                ->setStandardDeviationCalculator(new StandardDeviationCalculator());
        
          $data = array(321737, 271530, 328027, 310692, 321334, 333103, 330550, 314289, 335015, 349384, 323249, 307448, 291002, 275438);
          $algorithm->setData($data);
          
          $this->assertEquals(true, $algorithm->isAnomaly(200));
          $this->assertEquals(false, $algorithm->isAnomaly(271530));
          $this->assertEquals(false, $algorithm->isAnomaly(260000));
      
    }

}

?>
