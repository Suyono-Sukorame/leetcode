class Solution {

/**
 * @param Integer $n
 * @return Integer
 */
function numSquares($n) {
    $dp = array_fill(0, $n + 1, PHP_INT_MAX);
    $dp[0] = 0;
    for ($i = 1; $i <= $n; $i++) {
        for ($j = 1; $j * $j <= $i; $j++) {
            $dp[$i] = min($dp[$i], 1 + $dp[$i - $j * $j]);
        }
    }
    
    return $dp[$n];
}
}

$solution = new Solution();
echo $solution->numSquares(12); // Output: 3
echo $solution->numSquares(13); // Output: 2
