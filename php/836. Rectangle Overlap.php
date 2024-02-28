class Solution {

/**
 * @param Integer[] $rec1
 * @param Integer[] $rec2
 * @return Boolean
 */
function isRectangleOverlap($rec1, $rec2) {
    $left = max($rec1[0], $rec2[0]);
    $right = min($rec1[2], $rec2[2]);
    
    $bottom = max($rec1[1], $rec2[1]);
    $top = min($rec1[3], $rec2[3]);
    
    return $left < $right && $bottom < $top;
}
}