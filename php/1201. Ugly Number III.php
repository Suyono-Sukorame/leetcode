class Solution {

/**
 * @param Integer $n
 * @param Integer $a
 * @param Integer $b
 * @param Integer $c
 * @return Integer
 */
function nthUglyNumber($n, $a, $b, $c) {
    $left = 1;
    $right = (int) 2e9;
    $ab = $this->lcm($a, $b);
    $ac = $this->lcm($a, $c);
    $bc = $this->lcm($b, $c);
    $abc = $this->lcm($ab, $c);
    while ($left < $right) {
        $mid = $left + floor(($right - $left) / 2);
        $count = floor($mid / $a) + floor($mid / $b) + floor($mid / $c) - floor($mid / $ab) - floor($mid / $ac) - floor($mid / $bc) + floor($mid / $abc);
        if ($count < $n) {
            $left = $mid + 1;
        } else {
            $right = $mid;
        }
    }
    return $left;
}

function gcd($a, $b) {
    return $b == 0 ? $a : $this->gcd($b, $a % $b);
}

function lcm($a, $b) {
    return $a * $b / $this->gcd($a, $b);
}
}
