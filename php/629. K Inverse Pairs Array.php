class Solution {

/**
 * @param Integer $n
 * @param Integer $k
 * @return Integer
 */
function kInversePairs($n, $k) {
    $mod = 1000000007;
    $dp = array_fill(0, $n + 1, array_fill(0, $k + 1, 0));
    
    $dp[1][0] = 1;
    for ($i = 2; $i <= $n; $i++) {
        $dp[$i][0] = 1;
        for ($j = 1; $j <= min($k, $i * ($i - 1) / 2); $j++) {
            $dp[$i][$j] = $dp[$i][$j - 1] + $dp[$i - 1][$j];
            if ($j >= $i) {
                $dp[$i][$j] -= $dp[$i - 1][$j - $i];
            }
            $dp[$i][$j] = ($dp[$i][$j] + $mod) % $mod;
        }
    }
    
    return $dp[$n][$k];
}
}
