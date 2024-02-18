class Solution {

/**
 * @param Integer[] $nums
 * @return Integer
 */
function findUnsortedSubarray($nums) {
    $n = count($nums);
    $left = 0;
    $right = $n - 1;
    
    while ($left < $n - 1 && $nums[$left] <= $nums[$left + 1]) {
        $left++;
    }
    
    if ($left === $n - 1) {
        return 0;
    }
    
    while ($right > 0 && $nums[$right] >= $nums[$right - 1]) {
        $right--;
    }
    
    $min_val = PHP_INT_MAX;
    $max_val = PHP_INT_MIN;
    for ($k = $left; $k <= $right; $k++) {
        $min_val = min($min_val, $nums[$k]);
        $max_val = max($max_val, $nums[$k]);
    }
    
    while ($left > 0 && $nums[$left - 1] > $min_val) {
        $left--;
    }
    
    while ($right < $n - 1 && $nums[$right + 1] < $max_val) {
        $right++;
    }
    
    return $right - $left + 1;
}
}
