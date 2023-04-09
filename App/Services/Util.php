<?php

namespace App\Services;

class Util
{
    public static function manhattanDistance($state1, $state2)
    {
        $n = (int)sqrt(strlen($state1));
        $dist = 0;

        // Convert states to arrays
        $arr1 = str_split($state1, 1);
        $arr2 = str_split($state2, 1);

        // Calculate Manhattan distance for each tile
        for ($i = 0; $i < $n * $n; $i++) {
            if ($arr1[$i] !== '0') {
                $x1 = $i % $n;
                $y1 = (int)($i / $n);
                $index2 = array_search($arr1[$i], $arr2);
                $x2 = $index2 % $n;
                $y2 = (int)($index2 / $n);
                $dist += abs($x1 - $x2) + abs($y1 - $y2);
            }
        }

        return $dist;
    }
}