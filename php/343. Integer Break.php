class Solution {

/**
 * @param Integer $n
 * @return Integer
 */
function integerBreak($n) {
    $dp = array_fill(0, $n + 1, 0);
    $dp[1] = 1;

    for ($i = 2; $i <= $n; $i++) {
        for ($j = 1; $j < $i; $j++) {
            $dp[$i] = max($dp[$i], $j * max($i - $j, $dp[$i - $j]));
        }
    }

    return $dp[$n];
}
}

$solution = new Solution();
echo $solution->integerBreak(10); // Output: 36
