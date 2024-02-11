class Solution {

/**
 * @param Integer[] $nums1
 * @param Integer[] $nums2
 * @return Integer[]
 */
function intersection($nums1, $nums2) {
    $set1 = array_flip($nums1);
    $intersection = [];
    
    foreach ($nums2 as $num) {
        if (isset($set1[$num])) {
            $intersection[] = $num;
            unset($set1[$num]);
        }
    }
    
    return $intersection;
}
}

$solution = new Solution();
$nums1 = [1, 2, 2, 1];
$nums2 = [2, 2];
print_r($solution->intersection($nums1, $nums2)); // Output: [2]
