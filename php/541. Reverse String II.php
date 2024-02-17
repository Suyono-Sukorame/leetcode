class Solution {

/**
 * @param String $s
 * @param Integer $k
 * @return String
 */
function reverseStr($s, $k) {
    $length = strlen($s);
    for ($i = 0; $i < $length; $i += 2 * $k) {
        $start = $i;
        $end = min($i + $k - 1, $length - 1);
        while ($start < $end) {
            $temp = $s[$start];
            $s[$start++] = $s[$end];
            $s[$end--] = $temp;
        }
    }
    return $s;
}
}
