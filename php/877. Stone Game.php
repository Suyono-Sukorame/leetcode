class Solution {

/**
 * @param Integer[] $piles
 * @return Boolean
 */
function stoneGame($piles) {
    $n = count($piles);
    
    $dp = array_fill(0, $n, array_fill(0, $n, 0));
    
    for ($i = 0; $i < $n; $i++) {
        $dp[$i][$i] = $piles[$i];
    }
    
    for ($len = 2; $len <= $n; $len++) {
        for ($i = 0; $i <= $n - $len; $i++) {
            $j = $i + $len - 1;
            $dp[$i][$j] = max($piles[$i] - $dp[$i + 1][$j], $piles[$j] - $dp[$i][$j - 1]);
        }
    }
    
    return $dp[0][$n - 1] > 0;
}
}
