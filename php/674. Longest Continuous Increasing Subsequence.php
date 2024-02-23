class Solution {

/**
 * @param Integer[] $nums
 * @return Integer
 */
function findLengthOfLCIS($nums) {
    $n = count($nums);
    if ($n == 0) return 0;
    
    $max_length = 1;
    $current_length = 1;
    
    for ($i = 1; $i < $n; $i++) {
        if ($nums[$i] > $nums[$i - 1]) {
            $current_length++;
            $max_length = max($max_length, $current_length);
        } else {
            $current_length = 1;
        }
    }
    
    return $max_length;
}
}
