class Solution {

/**
 * @param Integer[] $arr
 * @return Integer
 */
function sumSubarrayMins($arr) {
    $mod = 1000000007;
    $stack = array();
    $left = array();
    $right = array();
    $n = count($arr);
    for ($i = 0; $i < $n; $i++) {
        $count = 1;
        while (!empty($stack) && $stack[count($stack) - 1][0] > $arr[$i]) {
            $count += $stack[count($stack) - 1][1];
            array_pop($stack);
        }
        $stack[] = array($arr[$i], $count);
        $left[$i] = $count;
    }
    $stack = array();
    for ($i = $n - 1; $i >= 0; $i--) {
        $count = 1;
        while (!empty($stack) && $stack[count($stack) - 1][0] >= $arr[$i]) {
            $count += $stack[count($stack) - 1][1];
            array_pop($stack);
        }
        $stack[] = array($arr[$i], $count);
        $right[$i] = $count;
    }
    $sum = 0;
    for ($i = 0; $i < $n; $i++) {
        $sum = ($sum + $arr[$i] * $left[$i] * $right[$i]) % $mod;
    }
    return $sum;
}
}
