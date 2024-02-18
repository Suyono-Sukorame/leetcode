class Solution {

/**
 * @param Integer $m
 * @param Integer $n
 * @param Integer[][] $ops
 * @return Integer
 */
function maxCount($m, $n, $ops) {
    $min_x = $m;
    $min_y = $n;
    
    foreach ($ops as $op) {
        $min_x = min($min_x, $op[0]);
        $min_y = min($min_y, $op[1]);
    }
    
    return $min_x * $min_y;
}
}
