class Solution {

/**
 * @param Integer[] $nums
 * @return Integer
 */
function maxRotateFunction($nums) {
    $n = count($nums);
    
    $totalSum = array_sum($nums);
    
    $currentSum = 0;
    for ($i = 0; $i < $n; $i++) {
        $currentSum += $i * $nums[$i];
    }
    
    $maxSum = $currentSum;
    
    for ($i = 1; $i < $n; $i++) {
        $currentSum += $totalSum - $n * $nums[$n - $i];
        $maxSum = max($maxSum, $currentSum);
    }
    
    return $maxSum;
}
}
