class Solution {

/**
 * @param Integer[] $nums
 * @return Integer
 */
function movesToMakeZigzag($nums) {
    $n = count($nums);
    $evenMoves = 0;
    $oddMoves = 0;
    
    for ($i = 0; $i < $n; $i++) {
        if ($i % 2 == 0) {
            $prev = ($i > 0) ? $nums[$i - 1] : PHP_INT_MAX;
            $next = ($i < $n - 1) ? $nums[$i + 1] : PHP_INT_MAX;
            $target = min($prev, $next) - 1;
            $evenMoves += max(0, $nums[$i] - $target);
        } 
        else {
            $prev = $nums[$i - 1];
            $next = ($i < $n - 1) ? $nums[$i + 1] : PHP_INT_MAX;
            $target = min($prev, $next) - 1;
            $oddMoves += max(0, $nums[$i] - $target);
        }
    }
    
    return min($evenMoves, $oddMoves);
}
}
