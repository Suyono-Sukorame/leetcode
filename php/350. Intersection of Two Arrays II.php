class Solution {

/**
 * @param Integer[] $nums1
 * @param Integer[] $nums2
 * @return Integer[]
 */
function intersect($nums1, $nums2) {
    $frequencyMap = [];
    $result = [];
    
    foreach ($nums1 as $num) {
        if (!isset($frequencyMap[$num])) {
            $frequencyMap[$num] = 0;
        }
        $frequencyMap[$num]++;
    }
    
    foreach ($nums2 as $num) {
        if (isset($frequencyMap[$num]) && $frequencyMap[$num] > 0) {
            $result[] = $num;
            $frequencyMap[$num]--;
        }
    }
    
    return $result;
}
}

$solution = new Solution();
$nums1 = [1, 2, 2, 1];
$nums2 = [2, 2];
print_r($solution->intersect($nums1, $nums2)); // Output: [2, 2]
