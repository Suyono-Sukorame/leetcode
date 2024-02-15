class Solution {

/**
 * @param Integer[] $nums
 * @return Integer
 */
function largestPerimeter($nums) {
    $sum = 0;
    sort($nums);
    foreach ($nums as $num) {
        $sum += $num;
    }
    $n = count($nums);
    for ($i = $n - 1; $i >= 2; $i--) {
        $sum -= $nums[$i];
        if ($sum > $nums[$i]) {
            return $sum + $nums[$i];
        }
    }
    return -1;
}
}

$solution = new Solution();
$nums1 = [5, 5, 5];
echo $solution->largestPerimeter($nums1) . "\n"; // Output: 15

$nums2 = [1, 12, 1, 2, 5, 50, 3];
echo $solution->largestPerimeter($nums2) . "\n"; // Output: 12

$nums3 = [5, 5, 50];
echo $solution->largestPerimeter($nums3) . "\n"; // Output: -1
