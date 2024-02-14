class Solution {

/**
 * @param Integer[] $nums
 * @return Integer
 */
function findMaxConsecutiveOnes($nums) {
    $maxCount = 0;
    $count = 0;
    
    foreach ($nums as $num) {
        if ($num == 1) {
            $count++;
            $maxCount = max($maxCount, $count);
        } else {
            $count = 0;
        }
    }
    
    return $maxCount;
}
}
