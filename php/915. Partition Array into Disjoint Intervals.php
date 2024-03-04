class Solution {

/**
 * @param Integer[] $nums
 * @return Integer
 */
function partitionDisjoint($nums) {
    $n = count($nums);
    $maxLeft = $nums[0];
    $maxOverall = $nums[0];
    $partitionIndex = 0;
    
    for ($i = 1; $i < $n; $i++) {
        $maxOverall = max($maxOverall, $nums[$i]);
        
        if ($nums[$i] < $maxLeft) {
            $partitionIndex = $i;
            $maxLeft = $maxOverall;
        }
    }
    
    return $partitionIndex + 1;
}
}
