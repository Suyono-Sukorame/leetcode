class Solution {

/**
 * @param Integer[] $arr
 * @return Integer
 */
function maxChunksToSorted($arr) {
    $rmin = [];
    $rmin[count($arr)] = PHP_INT_MAX;
    for ($i = count($arr) - 1; $i >= 0; $i--) {
        $rmin[$i] = min($rmin[$i + 1], $arr[$i]);
    }
    
    $lmax = PHP_INT_MIN;
    $count = 0;
    for ($i = 0; $i < count($arr); $i++) {
        $lmax = max($lmax, $arr[$i]);
        if ($lmax <= $rmin[$i + 1]) {
            $count++;
        }
    }
    
    return $count;
}
}
