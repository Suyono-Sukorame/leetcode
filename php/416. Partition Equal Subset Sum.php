class Solution {

/**
 * @param Integer[] $nums
 * @return Boolean
 */
function canPartition($nums) {
    $sum = array_sum($nums);
    
    if ($sum % 2 != 0) {
        return false;
    }
    
    $target = $sum / 2;
    $n = count($nums);
    
    $dp = array_fill(0, $target + 1, false);
    $dp[0] = true;
    
    foreach ($nums as $num) {
        for ($j = $target; $j >= $num; $j--) {
            $dp[$j] = $dp[$j] || $dp[$j - $num];
        }
    }
    
    return $dp[$target];
}
}

// Test cases
$solution = new Solution();
var_dump($solution->canPartition([1, 5, 11, 5])); // Output: true
var_dump($solution->canPartition([1, 2, 3, 5])); // Output: false
