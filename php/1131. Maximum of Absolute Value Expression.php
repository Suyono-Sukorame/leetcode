class Solution {

/**
 * @param Integer[] $arr1
 * @param Integer[] $arr2
 * @return Integer
 */
function maxAbsValExpr($arr1, $arr2) {
    $n = count($arr1);
    $maxValue = 0;
    
    for ($p = -1; $p <= 1; $p += 2) {
        for ($q = -1; $q <= 1; $q += 2) {
            $prev = $p * $arr1[0] + $q * $arr2[0] + 0;
            for ($i = 1; $i < $n; $i++) {
                $cur = $p * $arr1[$i] + $q * $arr2[$i] + $i;
                $maxValue = max($maxValue, $cur - $prev);
                $prev = min($prev, $cur);
            }
        }
    }
    
    return $maxValue;
}
}
