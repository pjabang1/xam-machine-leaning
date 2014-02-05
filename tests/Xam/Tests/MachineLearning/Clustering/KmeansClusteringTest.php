<?php

namespace Xam\Tests\MachineLearning\Clustering;

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

use Xam\MachineLearning\Clustering\KmeansClustering;

class KmeansClusteringTest extends \PHPUnit_Framework_TestCase {

    public function testClustering() {
        $engine = new KmeansClustering();
        $n = 3;
        $data = array(1, 3, 2, 5, 6, 2, 3, 1, 30, 36, 45, 3, 15, 17);
        $expected = Array
            (
            0 => Array
                (
                0 => 1,
                1 => 3,
                2 => 2,
                3 => 5,
                4 => 6,
                5 => 2,
                6 => 3,
                7 => 1,
                11 => 3
            ),
            2 => Array
                (
                8 => 30,
                9 => 36,
                10 => 45
            ),
            1 => Array
                (
                12 => 15,
                13 => 17,
            )
        );
        
        

        $this->assertEquals($expected, $engine->getClusters($data, $n));
    }

    public function testClusteringSeasonal() {
        $engine = new KmeansClustering();
        $n = 4;
        $data = array(
            '201201' => 1050,
            '201202' => 691,
            '201203' => 752,
            '201204' => 365,
            '201205' => 251,
            '201206' => 282,
            '201207' => 328,
            '201208' => 521,
            '201209' => 1586,
            '201210' => 3562,
            '201211' => 12249,
            '201212' => 22506,
            '201301' => 419,
            '201302' => 110,
            '201303' => 226,
            '201304' => 172,
            '201305' => 262,
            '201306' => 278,
            '201307' => 444,
            '201308' => 795,
            '201309' => 1771,
            '201310' => 4011,
            '201311' => 13298,
            '201312' => 22117
        );

        $expected = array(
            0 => array(
                201201 => 1050,
                201202 => 691,
                201203 => 752,
                201204 => 365,
                201205 => 251,
                201206 => 282,
                201207 => 328,
                201208 => 521,
                201209 => 1586,
                201301 => 419,
                201302 => 110,
                201303 => 226,
                201304 => 172,
                201305 => 262,
                201306 => 278,
                201307 => 444,
                201308 => 795,
                201309 => 1771
            ),
            1 => array(
                201210 => 3562,
                201310 => 4011,
            ),
            2 => array(
                201211 => 12249,
                201311 => 13298
            ),
            3 => array(
                201212 => 22506,
                201312 => 22117
            )
        );

        $this->assertEquals($expected, $engine->getClusters($data, $n));
    }

}

?>
