class Solution {

/**
 * @param Integer[] $nums
 * @param Integer $k
 * @return Integer
 */
function smallestRangeII($nums, $k) {
    sort($nums);
    $n = count($nums);
    $min_score = $nums[$n - 1] - $nums[0];
    for ($i = 0; $i < $n - 1; $i++) {
        $max_num = max($nums[$i] + $k, $nums[$n - 1] - $k);
        $min_num = min($nums[0] + $k, $nums[$i + 1] - $k);
        $min_score = min($min_score, $max_num - $min_num);
    }
    return $min_score;
}
}
