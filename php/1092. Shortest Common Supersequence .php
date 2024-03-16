class Solution {

/**
 * @param String $str1
 * @param String $str2
 * @return String
 */
function shortestCommonSupersequence($str1, $str2) {
    $m = strlen($str1);
    $n = strlen($str2);
    
    $dp = array_fill(0, $m + 1, array_fill(0, $n + 1, 0));
    
    for ($i = 1; $i <= $m; $i++) {
        for ($j = 1; $j <= $n; $j++) {
            if ($str1[$i - 1] == $str2[$j - 1]) {
                $dp[$i][$j] = $dp[$i - 1][$j - 1] + 1;
            } else {
                $dp[$i][$j] = max($dp[$i - 1][$j], $dp[$i][$j - 1]);
            }
        }
    }
    
    $supersequence = "";
    $i = $m;
    $j = $n;
    while ($i > 0 && $j > 0) {
        if ($str1[$i - 1] == $str2[$j - 1]) {
            $supersequence = $str1[$i - 1] . $supersequence;
            $i--;
            $j--;
        } else {
            if ($dp[$i - 1][$j] > $dp[$i][$j - 1]) {
                $supersequence = $str1[$i - 1] . $supersequence;
                $i--;
            } else {
                $supersequence = $str2[$j - 1] . $supersequence;
                $j--;
            }
        }
    }
    
    while ($i > 0) {
        $supersequence = $str1[$i - 1] . $supersequence;
        $i--;
    }
    while ($j > 0) {
        $supersequence = $str2[$j - 1] . $supersequence;
        $j--;
    }
    
    return $supersequence;
}
}
