class Solution {

/**
 * @param Integer[][] $grid
 * @return Integer
 */
function surfaceArea($grid) {
    $n = count($grid);
    $area = 0;
    
    for ($i = 0; $i < $n; $i++) {
        for ($j = 0; $j < $n; $j++) {
            if ($grid[$i][$j] > 0) {
                $area += 2 + $grid[$i][$j] * 4;
            }
        }
    }
    
    for ($i = 0; $i < $n; $i++) {
        for ($j = 0; $j < $n; $j++) {
            if ($grid[$i][$j] > 0) {
                if ($i > 0) {
                    $area -= min($grid[$i][$j], $grid[$i - 1][$j]) * 2;
                }
                if ($j > 0) {
                    $area -= min($grid[$i][$j], $grid[$i][$j - 1]) * 2;
                }
            }
        }
    }
    
    return $area;
}
}
