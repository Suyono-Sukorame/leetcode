class Solution {

/**
 * @param String $s
 * @return Integer
 */
function numPermsDISequence($s) {
    $mod = 1000000007;
    $n = strlen($s);
    
    $dp = array_fill(0, $n + 1, 1);
    
    for ($i = 0; $i < $n; $i++) {
        $next = array_fill(0, $n + 1, 0);
        if ($s[$i] == 'I') {
            $sum = 0;
            for ($j = 0; $j < $n - $i; $j++) {
                $sum = ($sum + $dp[$j]) % $mod;
                $next[$j] = $sum;
            }
        } else {
            $sum = 0;
            for ($j = $n - $i - 1; $j >= 0; $j--) {
                $sum = ($sum + $dp[$j + 1]) % $mod;
                $next[$j] = $sum;
            }
        }
        $dp = $next;
    }
    
    return $dp[0];
}
}
