class Solution {

/**
 * @param Integer $n
 * @return Integer
 */
function bulbSwitch($n) {
    return (int)sqrt($n);
}
}

$solution = new Solution();
echo $solution->bulbSwitch(3) . "\n"; // Output: 1
echo $solution->bulbSwitch(0) . "\n"; // Output: 0
echo $solution->bulbSwitch(1) . "\n"; // Output: 1
