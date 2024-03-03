class Solution {

/**
 * @param Integer[] $nums
 * @param Integer $k
 * @return Integer
 */
function smallestRangeI($nums, $k) {
    $min_val = min($nums);
    $max_val = max($nums);
    $diff = $max_val - $min_val;
    $result = max(0, $diff - 2 * $k);
    return $result;
}
}
