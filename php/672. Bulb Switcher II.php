class Solution {

/**
 * @param Integer $n
 * @param Integer $presses
 * @return Integer
 */
function flipLights($n, $presses) {
    if ($n == 2 && $presses == 1) return 3;
    if ($presses == 1) return min(1 << min(4, $n), 4);
    if ($presses == 2) return min(1 << min(4, $n), 7);
    if ($presses >= 3) return min(1 << min(4, $n), 8);
    return 1;
}
}
