class Solution {

/**
 * @param Integer[][] $matrix
 * @return Integer
 */
function minFallingPathSum($matrix) {
    $n = count($matrix);
    
    for ($i = $n - 2; $i >= 0; $i--) {
        for ($j = 0; $j < $n; $j++) {
            $min = $matrix[$i + 1][$j];
            
            if ($j - 1 >= 0) {
                $min = min($min, $matrix[$i + 1][$j - 1]);
            }
            
            if ($j + 1 < $n) {
                $min = min($min, $matrix[$i + 1][$j + 1]);
            }
            
            $matrix[$i][$j] += $min;
        }
    }
    
    return min($matrix[0]);
}
}