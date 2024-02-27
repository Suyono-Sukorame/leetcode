class Solution {

/**
 * @param Integer[] $nums1
 * @param Integer[] $nums2
 * @return Integer
 */
function minSwap($nums1, $nums2) {
    $n = count($nums1);
    $swap = array_fill(0, $n, PHP_INT_MAX);
    $noSwap = array_fill(0, $n, PHP_INT_MAX);
    
    $swap[0] = 1;
    $noSwap[0] = 0;
    
    for ($i = 1; $i < $n; $i++) {
        if ($nums1[$i] > $nums1[$i - 1] && $nums2[$i] > $nums2[$i - 1]) {
            $noSwap[$i] = $noSwap[$i - 1];
            $swap[$i] = $swap[$i - 1] + 1;
        }
        
        if ($nums1[$i] > $nums2[$i - 1] && $nums2[$i] > $nums1[$i - 1]) {
            $noSwap[$i] = min($noSwap[$i], $swap[$i - 1]);
            $swap[$i] = min($swap[$i], $noSwap[$i - 1] + 1);
        }
    }
    
    return min($swap[$n - 1], $noSwap[$n - 1]);
}
}
