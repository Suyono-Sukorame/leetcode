class Solution {

/**
 * @param Integer[] $nums1
 * @param Integer[] $nums2
 * @return Integer[]
 */
function nextGreaterElement($nums1, $nums2) {
    $map = [];
    $stack = [];
    foreach ($nums2 as $num) {
        while (!empty($stack) && end($stack) < $num) {
            $map[array_pop($stack)] = $num;
        }
        array_push($stack, $num);
    }
    
    $result = [];
    foreach ($nums1 as $num) {
        $result[] = isset($map[$num]) ? $map[$num] : -1;
    }
    
    return $result;
}
}
