class Solution {

function minimumDeleteSum($s1, $s2) {
    $m = strlen($s1);
    $n = strlen($s2);
    
    $dp = array_fill(0, $m + 1, array_fill(0, $n + 1, 0));
    
    for ($i = $m - 1; $i >= 0; $i--) {
        $dp[$i][$n] = $dp[$i + 1][$n] + ord($s1[$i]);
    }
    
    for ($j = $n - 1; $j >= 0; $j--) {
        $dp[$m][$j] = $dp[$m][$j + 1] + ord($s2[$j]);
    }
    
    for ($i = $m - 1; $i >= 0; $i--) {
        for ($j = $n - 1; $j >= 0; $j--) {
            if ($s1[$i] == $s2[$j]) {
                $dp[$i][$j] = $dp[$i + 1][$j + 1];
            } else {
                $dp[$i][$j] = min(
                    ord($s1[$i]) + $dp[$i + 1][$j],
                    ord($s2[$j]) + $dp[$i][$j + 1]
                );
            }
        }
    }
    
    return $dp[0][0];
}
}
