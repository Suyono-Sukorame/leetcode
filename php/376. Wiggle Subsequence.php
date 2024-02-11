class Solution {

/**
 * @param Integer[] $nums
 * @return Integer
 */
function wiggleMaxLength($nums) {
    if (count($nums) < 2) return count($nums);
    
    $up = 1;
    $down = 1;
    
    for ($i = 1; $i < count($nums); $i++) {
        if ($nums[$i] > $nums[$i - 1]) {
            $up = $down + 1;
        } elseif ($nums[$i] < $nums[$i - 1]) {
            $down = $up + 1;
        }
    }
    
    return max($up, $down);
}
}
