class Solution {

/**
 * @param String $word1
 * @param String $word2
 * @return Integer
 */
function minDistance($word1, $word2) {
    $m = strlen($word1);
    $n = strlen($word2);
    
    $dp = [];
    for ($i = 0; $i <= $m; $i++) {
        $dp[$i] = [];
        for ($j = 0; $j <= $n; $j++) {
            $dp[$i][$j] = 0;
        }
    }
    
    for ($i = 1; $i <= $m; $i++) {
        for ($j = 1; $j <= $n; $j++) {
            if ($word1[$i - 1] === $word2[$j - 1]) {
                $dp[$i][$j] = $dp[$i - 1][$j - 1] + 1;
            } else {
                $dp[$i][$j] = max($dp[$i - 1][$j], $dp[$i][$j - 1]);
            }
        }
    }
    
    return $m + $n - 2 * $dp[$m][$n];
}
}
