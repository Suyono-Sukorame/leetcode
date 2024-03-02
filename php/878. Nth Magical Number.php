class Solution {

/**
 * @param Integer $n
 * @param Integer $a
 * @param Integer $b
 * @return Integer
 */
function nthMagicalNumber($n, $a, $b) {
    $mod = 1000000007;
    $lcm = $a * $b / $this->gcd($a, $b);
    $left = 0;
    $right = $n * min($a, $b);
    while ($left < $right) {
        $mid = (int)(($left + $right) / 2);
        $count = intval($mid / $a) + intval($mid / $b) - intval($mid / $lcm);
        if ($count < $n) {
            $left = $mid + 1;
        } else {
            $right = $mid;
        }
    }
    return $left % $mod;
}

function gcd($a, $b) {
    while ($b != 0) {
        $temp = $b;
        $b = $a % $b;
        $a = $temp;
    }
    return $a;
}
}
