class Solution {

/**
 * @param Integer $n
 * @param Integer $k
 * @return Integer[]
 */
function constructArray($n, $k) {
    $arr = array_fill(0, $n, 0);
    $arr[0] = 1;
    $x = 1 + $k;
    for ($i = 1; $i < count($arr); $i++) {
        $arr[$i] = ($k <= 0) ? ++$x : (($i % 2 == 0) ? ($arr[$i-1] - $k) : ($arr[$i-1] + $k));
        $k--;
    }
    return $arr;
}
}