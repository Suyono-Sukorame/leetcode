class Solution {

/**
 * @param Integer[] $nums
 * @return Integer
 */
function dominantIndex($nums) {
    $maxIndex = 0;
    $maxValue = $nums[0];
    
    for ($i = 1; $i < count($nums); $i++) {
        if ($nums[$i] > $maxValue) {
            $maxValue = $nums[$i];
            $maxIndex = $i;
        }
    }
    
    for ($i = 0; $i < count($nums); $i++) {
        if ($i != $maxIndex && $nums[$i] * 2 > $maxValue) {
            return -1;
        }
    }
    
    return $maxIndex;
}
}
