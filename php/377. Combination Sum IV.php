class Solution {

/**
 * @param Integer[] $nums
 * @param Integer $target
 * @return Integer
 */
function combinationSum4($nums, $target) {
    $dp = array_fill(0, $target + 1, 0);
    $dp[0] = 1;
    
    for ($i = 1; $i <= $target; $i++) {
        foreach ($nums as $num) {
            if ($i - $num >= 0) {
                $dp[$i] += $dp[$i - $num];
            }
        }
    }
    
    return $dp[$target];
}
}
