class Solution {

/**
 * @param Integer[] $arr
 * @return Integer
 */
function maxTurbulenceSize($arr) {
    $n = count($arr);
    if ($n == 1) return 1;
    
    $maxLen = 1;
    $left = 0;
    
    for ($right = 1; $right < $n; $right++) {
        $compare = $this->compare($arr[$right - 1], $arr[$right]);
        
        if ($compare == 0) {
            $left = $right;
        } elseif ($right == $n - 1 || $compare * $this->compare($arr[$right], $arr[$right + 1]) != -1) {
            $maxLen = max($maxLen, $right - $left + 1);
            $left = $right;
        }
    }
    
    return $maxLen;
}

function compare($a, $b) {
    return $a == $b ? 0 : ($a > $b ? 1 : -1);
}
}
