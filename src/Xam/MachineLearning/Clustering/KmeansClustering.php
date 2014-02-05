<?php

namespace Xam\MachineLearning\Clustering;

/**
 * This code was created by Jose Fonseca (josefonseca@blip.pt) 
 *
 * Please feel free to use it in either commercial or non-comercial applications,
 * and if you enjoy using it feel free to let us know or to comment on our
 * technical blog at http://code.blip.pt
 */


class KmeansClustering {

    /**
     * This function takes a array of integers and the number of clusters to create.
     * It returns a multidimensional array containing the original data organized
     * in clusters.
     *
     * @param array $data
     * @param int $k
     *
     * @return array
     */
    public function getClusters($data, $k) {
        $cPositions = $this->assignInitialPositions($data, $k);
        $clusters = array();

        $i = 0;
        while (true) {
            $i++;
            // echo $i . "\n";
            $changes = $this->cluster($data, $cPositions, $clusters);
            if (!$changes) {
                return $this->getClusterValues($clusters, $data);
            }
            $cPositions = $this->recalculateCpositions($cPositions, $data, $clusters);
        }
    }

    /**
     *
     */
    public function cluster($data, $cPositions, &$clusters) {
        $nChanges = 0;
        foreach ($data as $dataKey => $value) {
            $minDistance = null;
            $cluster = null;
            foreach ($cPositions as $k => $position) {
                $distance = $this->distance($value, $position);
                if (is_null($minDistance) || $minDistance > $distance) {
                    $minDistance = $distance;
                    $cluster = $k;
                }
            }
            if (!isset($clusters[$dataKey]) || $clusters[$dataKey] != $cluster) {
                $nChanges++;
            }
            $clusters[$dataKey] = $cluster;
        }

        return $nChanges;
    }

    /**
     * 
     * @param type $cPositions
     * @param type $data
     * @param type $clusters
     * @return type
     */
    public function recalculateCpositions($cPositions, $data, $clusters) {
        $kValues = $this->getClusterValues($clusters, $data);
        foreach ($cPositions as $k => $position) {
            $cPositions[$k] = empty($kValues[$k]) ? 0 : $this->avg($kValues[$k]);
        }
        return $cPositions;
    }

    /**
     * 
     * @param type $clusters
     * @param type $data
     * @return type
     */
    public function getClusterValues($clusters, $data) {
        $values = array();
        foreach ($clusters as $dataKey => $cluster) {
            $values[$cluster][$dataKey] = $data[$dataKey];
        }
        return $values;
    }

    /**
     * 
     * @param type $values
     * @return type
     */
    protected function avg($values) {
        $n = count($values);
        $sum = array_sum($values);
        return ($n == 0) ? 0 : $sum / $n;
    }

    /**
     * Calculates the distance (or similarity) between two values. The closer
     * the return value is to ZERO, the more similar the two values are.
     *
     * @param int $v1
     * @param int $v2
     *
     * @return int
     */
    protected function distance($v1, $v2) {
        return sqrt(pow($v1 - $v2, 2)); // Euclidean distance
        // return abs($v1 - $v2);
    }

    /**
     * Creates the initial positions for the given
     * number of clusters and data.
     * @param array $data
     * @param int $k
     *
     * @return array
     */
    public function assignInitialPositions($data, $k) {
        $min = min($data);
        $max = max($data);
        $int = ceil(abs($max - $min) / $k);
        while ($k-- > 0) {
            $cPositions[$k] = $min + $int * $k;
        }
        return $cPositions;
    }

}