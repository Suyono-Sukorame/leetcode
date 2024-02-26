class Solution {

/**
 * @param Integer $target
 * @return Integer
 */
function reachNumber($target) {
    $target = abs($target);
    
    $steps = 0;
    $sum = 0;
    while ($sum < $target || ($sum - $target) % 2 != 0) {
        $steps++;
        $sum += $steps;
    }
    
    return $steps;
}
}
