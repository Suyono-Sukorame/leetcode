class Solution {

/**
 * @param Integer[] $nums
 * @return Integer
 */
function minMoves2($nums) {
    sort($nums);
    
    $n = count($nums);
    $median = $nums[floor($n / 2)];
    
    $moves = 0;
    foreach ($nums as $num) {
        $moves += abs($num - $median);
    }
    
    return $moves;
}
}
