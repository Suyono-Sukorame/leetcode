class Solution {

/**
 * @param Integer $label
 * @return Integer[]
 */
function pathInZigZagTree($label) {
    $level = 1;
    $num = 1;
    $levelCount = 1;
    
    while ($num < $label) {
        $levelCount *= 2;
        $num += $levelCount;
        $level += 1;
    }
    
    $ans = [$label];
    while (--$level) {
        $levelEnd = 2 ** ($level) - 1;
        $levelStart = 2 ** ($level - 1);
        $target = floor($label / 2);
        $target = $levelEnd + $levelStart - $target;
        $label = $target;
        $ans[] = $target;
    }
    
    return array_reverse($ans);
}
}
