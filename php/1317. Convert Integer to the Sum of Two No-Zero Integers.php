class Solution {

/**
 * @param Integer $n
 * @return Integer[]
 */
function getNoZeroIntegers($n) {
    for ($a = 1; $a < $n; $a++) {
        $b = $n - $a;
        if (strpos($a, '0') === false && strpos($b, '0') === false) {
            return [$a, $b];
        }
    }
    return [-1, -1];
}
}
