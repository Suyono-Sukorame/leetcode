class Solution {

/**
 * @param Integer[] $nums1
 * @param Integer[] $nums2
 * @param Integer[] $nums3
 * @param Integer[] $nums4
 * @return Integer
 */
function fourSumCount($nums1, $nums2, $nums3, $nums4) {
    $count = 0;
    $sums = [];
    
    foreach ($nums1 as $num1) {
        foreach ($nums2 as $num2) {
            $sum = $num1 + $num2;
            $sums[$sum] = ($sums[$sum] ?? 0) + 1;
        }
    }
    
    foreach ($nums3 as $num3) {
        foreach ($nums4 as $num4) {
            $target = -$num3 - $num4;
            if (isset($sums[$target])) {
                $count += $sums[$target];
            }
        }
    }
    
    return $count;
}
}
