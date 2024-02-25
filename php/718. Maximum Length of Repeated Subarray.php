class Solution {

/**
 * @param Integer[] $nums1
 * @param Integer[] $nums2
 * @return Integer
 */
function findLength($nums1, $nums2) {
    $m = count($nums1);
    $n = count($nums2);
    
    $dp = array_fill(0, $m + 1, array_fill(0, $n + 1, 0));
    $maxLen = 0;
    
    for ($i = $m - 1; $i >= 0; $i--) {
        for ($j = $n - 1; $j >= 0; $j--) {
            if ($nums1[$i] == $nums2[$j]) {
                $dp[$i][$j] = $dp[$i + 1][$j + 1] + 1;
                $maxLen = max($maxLen, $dp[$i][$j]);
            }
        }
    }
    
    return $maxLen;
}
}
