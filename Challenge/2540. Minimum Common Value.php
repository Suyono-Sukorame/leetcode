class Solution {

/**
 * @param Integer[] $nums1
 * @param Integer[] $nums2
 * @return Integer
 */
function getCommon($nums1, $nums2) {
    $i = 0;
    $j = 0;
    
    while ($i < count($nums1) && $j < count($nums2)) {
        if ($nums1[$i] == $nums2[$j]) {
            return $nums1[$i];
        } elseif ($nums1[$i] < $nums2[$j]) {
            $i++;
        } else {
            $j++;
        }
    }
    
    return -1;
}
}
