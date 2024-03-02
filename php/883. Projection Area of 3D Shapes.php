class Solution {

/**
 * @param Integer[][] $grid
 * @return Integer
 */
function projectionArea($grid) {
    $n = count($grid);
    $xy = 0;
    $yz = array_fill(0, $n, 0);
    $zx = array_fill(0, $n, 0);
    
    for ($i = 0; $i < $n; $i++) {
        for ($j = 0; $j < $n; $j++) {
            if ($grid[$i][$j] > 0) {
                $xy++;
            }
            $yz[$j] = max($yz[$j], $grid[$i][$j]);
            $zx[$i] = max($zx[$i], $grid[$i][$j]);
        }
    }
    
    return $xy + array_sum($yz) + array_sum($zx);
}
}
