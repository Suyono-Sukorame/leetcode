class Solution {

/**
 * @param Integer[][] $grid
 * @return Integer
 */
function matrixScore($grid) {
    $m = count($grid);
    $n = count($grid[0]);
    
    for ($i = 0; $i < $m; $i++) {
        if ($grid[$i][0] == 0) {
            for ($j = 0; $j < $n; $j++) {
                $grid[$i][$j] = 1 - $grid[$i][$j];
            }
        }
    }
    
    for ($j = 1; $j < $n; $j++) {
        $countOnes = 0;
        for ($i = 0; $i < $m; $i++) {
            if ($grid[$i][$j] == 1) {
                $countOnes++;
            }
        }
        if ($countOnes < $m / 2) {
            for ($i = 0; $i < $m; $i++) {
                $grid[$i][$j] = 1 - $grid[$i][$j];
            }
        }
    }
    
    $score = 0;
    foreach ($grid as $row) {
        $rowBinary = bindec(implode("", $row));
        $score += $rowBinary;
    }
    
    return $score;
}
}
