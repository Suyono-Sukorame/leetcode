class Solution {

/**
 * @param Integer[][] $grid
 * @return Integer
 */
function maxIncreaseKeepingSkyline($grid) {
    $n = count($grid);
    $maxRow = array_fill(0, $n, 0);
    $maxCol = array_fill(0, $n, 0);
    
    for ($i = 0; $i < $n; $i++) {
        for ($j = 0; $j < $n; $j++) {
            $maxRow[$i] = max($maxRow[$i], $grid[$i][$j]);
            $maxCol[$j] = max($maxCol[$j], $grid[$i][$j]);
        }
    }
    
    $maxIncrease = 0;
    for ($i = 0; $i < $n; $i++) {
        for ($j = 0; $j < $n; $j++) {
            $maxIncrease += min($maxRow[$i], $maxCol[$j]) - $grid[$i][$j];
        }
    }
    
    return $maxIncrease;
}
}
