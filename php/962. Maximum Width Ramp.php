class Solution {

/**
 * @param Integer[] $nums
 * @return Integer
 */
function maxWidthRamp($nums) {
    $stack = array();
    $maxWidth = 0;
    $n = count($nums);
    
    for ($i = 0; $i < $n; $i++) {
        if (empty($stack) || $nums[$stack[count($stack) - 1]] > $nums[$i]) {
            $stack[] = $i;
        }
    }
    
    for ($j = $n - 1; $j >= 0; $j--) {
        while (!empty($stack) && $nums[$stack[count($stack) - 1]] <= $nums[$j]) {
            $maxWidth = max($maxWidth, $j - array_pop($stack));
        }
    }
    
    return $maxWidth;
}
}
