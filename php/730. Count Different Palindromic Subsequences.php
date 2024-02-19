class Solution {

/**
 * @param String $S
 * @return Integer
 */
function countPalindromicSubsequences($S) {
    $len = strlen($S);
    $dp = array_fill(0, $len, array_fill(0, $len, 0));
    $input = str_split($S);
    $prev = array_fill(0, $len, 0);
    $mapPrev = [];
    $mod = 1000000007;
    
    for ($i = 0; $i < $len; $i++) {
        $ch = $input[$i];
        if (array_key_exists($ch, $mapPrev)) {
            $prev[$i] = $mapPrev[$ch];
        } else {
            $prev[$i] = -1;
        }
        $mapPrev[$ch] = $i;
    }
    
    $mapNext = [];
    $next = array_fill(0, $len, 0);
    for ($i = $len - 1; $i >= 0; $i--) {
        $ch = $input[$i];
        if (array_key_exists($ch, $mapNext)) {
            $next[$i] = $mapNext[$ch];
        } else {
            $next[$i] = -1;
        }
        $mapNext[$ch] = $i;
    }
    
    for ($i = 0; $i < $len; $i++) {
        $dp[$i][$i] = 1;
    }
    
    for ($dist = 0; $dist < $len; $dist++) {
        for ($i = 0; $i < $len - $dist; $i++) {
            $j = $i + $dist;
            if ($i == $j) {
                $dp[$i][$j] = 1;
            } else {
                $sc = $input[$i];
                $ec = $input[$j];
                
                if ($sc != $ec) {
                    $dp[$i][$j] = $dp[$i+1][$j] + $dp[$i][$j-1] - $dp[$i+1][$j-1];
                } else {
                    $n = $next[$i];
                    $p = $prev[$j];
                    
                    if ($n > $p) {
                        $dp[$i][$j] = 2 * $dp[$i+1][$j-1] + 2;
                    } elseif ($n == $p) {
                        $dp[$i][$j] = 2 * $dp[$i+1][$j-1] + 1;
                    } else {
                        $dp[$i][$j] = 2 * $dp[$i+1][$j-1] - $dp[$n+1][$p-1];
                    }
                }
            }
            $dp[$i][$j] = $dp[$i][$j] < 0 ? $dp[$i][$j] + $mod : $dp[$i][$j] % $mod;
        }
    }
    
    return $dp[0][$len-1];
}
}
