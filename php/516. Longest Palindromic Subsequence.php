class Solution {

/**
 * @param String $s
 * @return Integer
 */
function longestPalindromeSubseq($s) {
    $n = strlen($s);
    $dp = array_fill(0, $n, array_fill(0, $n, 0));

    for ($i = 0; $i < $n; $i++) {
        $dp[$i][$i] = 1;
    }

    for ($len = 2; $len <= $n; $len++) {
        for ($start = 0; $start <= $n - $len; $start++) {
            $end = $start + $len - 1;
            if ($s[$start] == $s[$end]) {
                $dp[$start][$end] = $dp[$start + 1][$end - 1] + 2;
            } else {
                $dp[$start][$end] = max($dp[$start + 1][$end], $dp[$start][$end - 1]);
            }
        }
    }

    return $dp[0][$n - 1];
}
}
