class Solution {

/**
 * @param Integer $n
 * @return Integer
 */
function lastRemaining($n) {
    $leftToRight = true;
    $remaining = $n;
    $step = 1;
    $start = 1;
    
    while ($remaining > 1) {
        if ($leftToRight || $remaining % 2 == 1) {
            $start += $step;
        }
        $step *= 2;
        $leftToRight = !$leftToRight;
        $remaining = intval($remaining / 2);
    }
    
    return $start;
}
}
