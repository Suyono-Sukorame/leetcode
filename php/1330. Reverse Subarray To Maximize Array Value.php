class Solution {

/**
 * @param Integer[] $nums
 * @return Integer
 */
function maxValueAfterReverse($nums) {
    $n = count($nums);
    $result = 0;
    
    for ($i = 0; $i < $n - 1; $i++) {
        $result += abs($nums[$i] - $nums[$i + 1]);
    }
    
    $minLine = PHP_INT_MIN;
    $maxLine = PHP_INT_MAX;
    
    for ($i = 0; $i < $n - 1; $i++) {
        $minLine = max($minLine, min($nums[$i], $nums[$i + 1]));
        $maxLine = min($maxLine, max($nums[$i], $nums[$i + 1]));
    }
    
    $diff = max(0, ($minLine - $maxLine) * 2);
    
    for ($i = 1; $i < $n - 1; $i++) {
        $diff = max($diff, abs($nums[0] - $nums[$i + 1]) - abs($nums[$i] - $nums[$i + 1]));
    }
    
    for ($i = 0; $i < $n - 1; $i++) {
        $diff = max($diff, abs($nums[$n - 1] - $nums[$i]) - abs($nums[$i + 1] - $nums[$i]));
    }
    
    return $result + $diff;
}
}
