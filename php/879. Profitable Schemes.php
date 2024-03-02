class Solution {

/**
 * @param Integer $n
 * @param Integer $minProfit
 * @param Integer[] $group
 * @param Integer[] $profit
 * @return Integer
 */
function profitableSchemes($n, $minProfit, $group, $profit) {
    $MOD = 1000000007;
    $dp = array_fill(0, $n + 1, array_fill(0, $minProfit + 1, 0));
    $dp[0][0] = 1;
    
    $numCrimes = count($group);
    for ($k = 0; $k < $numCrimes; $k++) {
        $g = $group[$k];
        $p = $profit[$k];
        
        for ($i = $n; $i >= $g; $i--) {
            for ($j = $minProfit; $j >= 0; $j--) {
                $dp[$i][$j] = ($dp[$i][$j] + $dp[$i - $g][max(0, $j - $p)]) % $MOD;
            }
        }
    }
    
    $total = 0;
    for ($i = 0; $i <= $n; $i++) {
        $total = ($total + $dp[$i][$minProfit]) % $MOD;
    }
    
    return $total;
}
}
