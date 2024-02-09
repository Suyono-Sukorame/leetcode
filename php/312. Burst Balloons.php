class Solution {

/**
 * @param Integer[] $nums
 * @return Integer
 */
function maxCoins($nums) {
    $n = count($nums);
    array_unshift($nums, 1);
    array_push($nums, 1);

    $dp = array_fill(0, $n + 2, array_fill(0, $n + 2, 0));

    for ($len = 1; $len <= $n; $len++) {
        for ($left = 1; $left <= $n - $len + 1; $left++) {
            $right = $left + $len - 1;
            for ($last = $left; $last <= $right; $last++) {
                $dp[$left][$right] = max($dp[$left][$right], 
                    $nums[$left - 1] * $nums[$last] * $nums[$right + 1] + 
                    $dp[$left][$last - 1] + $dp[$last + 1][$right]);
            }
        }
    }

    return $dp[1][$n];
}
}
