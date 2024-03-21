class Solution {

/**
 * @param Integer[] $nums
 * @param Integer $k
 * @return Integer
 */
function numberOfSubarrays($nums, $k) {
    $count = 0;
    $oddCount = 0;
    $prefixCounts = array_fill(0, count($nums) + 1, 0);
    
    $prefixCounts[0] = 1;
    
    foreach ($nums as $num) {
        if ($num % 2 == 1) {
            $oddCount++;
        }
        if ($oddCount >= $k) {
            $count += $prefixCounts[$oddCount - $k];
        }
        $prefixCounts[$oddCount]++;
    }
    
    return $count;
}
}