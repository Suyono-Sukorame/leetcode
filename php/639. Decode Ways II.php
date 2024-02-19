class Solution {
    /**
     * @param String $s
     * @return Integer
     */
    function numDecodings($s) {
        $mod = pow(10, 9) + 7;
        $dp = [];
        $n = strlen($s);
        
        $dp[0] = 1;
        $dp[1] = $s[0] == '*' ? 9 : ($s[0] == '0' ? 0 : 1);
        
        for ($i = 1; $i < $n; $i++) {
            if ($s[$i] == '*') {
                $dp[$i + 1] = 9 * $dp[$i] % $mod;
                if ($s[$i - 1] == '1') {
                    $dp[$i + 1] = ($dp[$i + 1] + 9 * $dp[$i - 1]) % $mod;
                } elseif ($s[$i - 1] == '2') {
                    $dp[$i + 1] = ($dp[$i + 1] + 6 * $dp[$i - 1]) % $mod;
                } elseif ($s[$i - 1] == '*') {
                    $dp[$i + 1] = ($dp[$i + 1] + 15 * $dp[$i - 1]) % $mod;
                }
            } else {
                $dp[$i + 1] = $s[$i] != '0' ? $dp[$i] : 0;
                if ($s[$i - 1] == '1') {
                    $dp[$i + 1] = ($dp[$i + 1] + $dp[$i - 1]) % $mod;
                } elseif ($s[$i - 1] == '2' && $s[$i] <= '6') {
                    $dp[$i + 1] = ($dp[$i + 1] + $dp[$i - 1]) % $mod;
                } elseif ($s[$i - 1] == '*') {
                    $dp[$i + 1] = ($dp[$i + 1] + ($s[$i] <= '6' ? 2 : 1) * $dp[$i - 1]) % $mod;
                }
            }
        }
        
        return $dp[$n];
    }
}
