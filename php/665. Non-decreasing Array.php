class Solution {

/**
 * @param Integer[] $nums
 * @return Boolean
 */
function checkPossibility($nums) {
    $count = 0;
    $n = count($nums);
    
    for ($i = 0; $i < $n - 1; $i++) {
        if ($nums[$i] > $nums[$i + 1]) {
            $count++;
            
            if ($count > 1) {
                return false;
            }
            
            if ($i > 0 && $nums[$i + 1] < $nums[$i - 1]) {
                $nums[$i + 1] = $nums[$i];
            }
        }
    }
    
    return true;
}
}
