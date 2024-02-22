class Solution {

/**
 * @param Integer[][] $pairs
 * @return Integer
 */
function findLongestChain($pairs) {
    usort($pairs, function($a, $b) {
        return $a[0] - $b[0];
    });
    
    $dp = array_fill(0, count($pairs), 1);
    
    for ($i = 1; $i < count($pairs); $i++) {
        for ($j = $i - 1; $j >= 0; $j--) {
            if ($pairs[$i][0] > $pairs[$j][1]) {
                $dp[$i] = max($dp[$i], $dp[$j] + 1);
            }
        }
    }
    
    return $dp[count($pairs) - 1];
}
}
