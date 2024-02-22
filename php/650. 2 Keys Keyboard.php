class Solution {

/**
 * @param Integer $n
 * @return Integer
 */
function minSteps($n) {
    $steps = 0;
    $clipboard = 0;
    $screen = 1;
    
    while ($screen < $n) {
        if ($n % $screen == 0) {
            $clipboard = $screen;
            $steps++;
        }
        $screen += $clipboard;
        $steps++;
    }
    
    return $steps;
}
}
