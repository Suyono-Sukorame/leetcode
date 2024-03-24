class Solution {

/**
 * @param Integer[] $jobDifficulty
 * @param Integer $d
 * @return Integer
 */
function minDifficulty($jobDifficulty, $d) {
    $n = count($jobDifficulty);
    if ($n < $d) return -1;
    
    $dp = array_fill(0, $n + 1, array_fill(0, $d + 1, PHP_INT_MAX));
    $dp[0][0] = 0;
    
    for ($i = 1; $i <= $n; $i++) {
        for ($k = 1; $k <= $d; $k++) {
            $maxDiff = 0;
            for ($j = $i - 1; $j >= $k - 1; $j--) {
                $maxDiff = max($maxDiff, $jobDifficulty[$j]);
                $dp[$i][$k] = min($dp[$i][$k], $dp[$j][$k - 1] + $maxDiff);
            }
        }
    }
    
    return $dp[$n][$d] != PHP_INT_MAX ? $dp[$n][$d] : -1;
}
}
