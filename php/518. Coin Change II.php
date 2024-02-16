class Solution {

/**
 * @param Integer $amount
 * @param Integer[] $coins
 * @return Integer
 */
function change($amount, $coins) {
    $dp = array_fill(0, $amount + 1, 0);
    $dp[0] = 1;

    foreach ($coins as $coin) {
        for ($i = $coin; $i <= $amount; $i++) {
            $dp[$i] += $dp[$i - $coin];
        }
    }

    return $dp[$amount];
}
}
