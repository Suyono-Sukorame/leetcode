class Solution {

/**
 * @param Integer $x
 * @param Integer $y
 * @return Integer
 */
function hammingDistance($x, $y) {
    $xor = $x ^ $y;
    
    $distance = 0;
    while ($xor > 0) {
        $distance += $xor & 1;
        $xor >>= 1;
    }
    
    return $distance;
}
}
