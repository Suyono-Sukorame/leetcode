class Solution {

/**
 * @param Integer[] $nums
 * @return Integer
 */
function minMoves($nums) {
    $minElement = min($nums);
    $moves = 0;
    
    foreach ($nums as $num) {
        $moves += $num - $minElement;
    }
    
    return $moves;
}
}
