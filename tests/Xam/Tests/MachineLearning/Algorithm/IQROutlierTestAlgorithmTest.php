<?php

namespace Xam\Tests\MachineLearning\Algorithm;

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

use Xam\Calculator\QuartileCalculator;
use Xam\MachineLearning\Algorithm\IQROutlierTestAlgorithm;

class IQROutlierTestAlgorithmTest extends \PHPUnit_Framework_TestCase {

    /**
     * 
     */
    public function testIsAnomaly() {
        $algorithm = new IQROutlierTestAlgorithm();
        $algorithm->setMild(false)->setQuartileCalculator(new QuartileCalculator());

        $data = array(321737, 271530, 328027, 310692, 321334, 333103, 330550, 314289, 335015, 349384, 323249, 307448, 291002, 275438);
        $algorithm->setData($data);

        $this->assertEquals(true, $algorithm->isAnomaly(200));
        $this->assertEquals(false, $algorithm->isAnomaly(290000));
        $this->assertEquals(false, $algorithm->isAnomaly(280000));
    }

}

?>
