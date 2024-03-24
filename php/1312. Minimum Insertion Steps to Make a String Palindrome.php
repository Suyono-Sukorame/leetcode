class Solution {

/**
 * @param String $s
 * @return Integer
 */
function minInsertions($s) {
    $n = strlen($s);
    $dp = array_fill(0, $n, array_fill(0, $n, 0));

    for ($len = 2; $len <= $n; $len++) {
        for ($i = 0; $i < $n - $len + 1; $i++) {
            $j = $i + $len - 1;
            if ($s[$i] == $s[$j]) {
                $dp[$i][$j] = $dp[$i + 1][$j - 1];
            } else {
                $dp[$i][$j] = min($dp[$i + 1][$j], $dp[$i][$j - 1]) + 1;
            }
        }
    }

    return $dp[0][$n - 1];
}
}
