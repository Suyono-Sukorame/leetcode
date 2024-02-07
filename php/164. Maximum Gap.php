class Solution {

/**
 * @param Integer[] $nums
 * @return Integer
 */
function maximumGap($nums) {
    if (count($nums) < 2) {
        return 0;
    }
    
    sort($nums);
    
    $maxGap = 0;
    
    for ($i = 1; $i < count($nums); $i++) {
        $maxGap = max($maxGap, $nums[$i] - $nums[$i - 1]);
    }
    
    return $maxGap;
}
}

$solution = new Solution();
echo $solution->maximumGap([3, 6, 9, 1]) . "\n"; // Output: 3
echo $solution->maximumGap([10]) . "\n"; // Output: 0
