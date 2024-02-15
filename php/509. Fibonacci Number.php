class Solution {

/**
 * @param Integer $n
 * @return Integer
 */
function fib($n) {
    $memo = [];
    $memo[0] = 0;
    $memo[1] = 1;
    for ($i = 2; $i <= $n; $i++) {
        $memo[$i] = $memo[$i - 1] + $memo[$i - 2];
    }
    return $memo[$n];
}
}
