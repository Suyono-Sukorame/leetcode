class Solution {

/**
 * @param Integer[] $nums
 * @return Integer
 */
function largestPerimeter($nums) {
    sort($nums);
    
    for ($i = count($nums) - 1; $i >= 2; $i--) {
        if ($nums[$i] < $nums[$i - 1] + $nums[$i - 2]) {
            return $nums[$i] + $nums[$i - 1] + $nums[$i - 2];
        }
    }
    
    return 0;
}
}
