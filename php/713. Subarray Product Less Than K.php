class Solution {

/**
 * @param Integer[] $nums
 * @param Integer $k
 * @return Integer
 */
function numSubarrayProductLessThanK($nums, $k) {
    if ($k <= 1) return 0;
    
    $count = 0;
    $product = 1;
    $left = 0;
    
    for ($right = 0; $right < count($nums); $right++) {
        $product *= $nums[$right];
        while ($product >= $k) {
            $product /= $nums[$left];
            $left++;
        }
        $count += $right - $left + 1;
    }
    
    return $count;
}
}
