class Solution {

function maxSumTwoNoOverlap($nums, $firstLen, $secondLen) {
    $prefixSum = [0];
    $n = count($nums);
    
    for ($i = 0; $i < $n; $i++) {
        $prefixSum[$i + 1] = $prefixSum[$i] + $nums[$i];
    }
    
    $maxSum = 0;
    
    for ($i = 0; $i <= $n - $firstLen; $i++) {
        $firstSubarraySum = $prefixSum[$i + $firstLen] - $prefixSum[$i];
        
        for ($j = 0; $j <= $i - $secondLen; $j++) {
            $secondSubarraySum = $prefixSum[$j + $secondLen] - $prefixSum[$j];
            $maxSum = max($maxSum, $firstSubarraySum + $secondSubarraySum);
        }
        
        for ($j = $i + $firstLen; $j <= $n - $secondLen; $j++) {
            $secondSubarraySum = $prefixSum[$j + $secondLen] - $prefixSum[$j];
            $maxSum = max($maxSum, $firstSubarraySum + $secondSubarraySum);
        }
    }
    
    return $maxSum;
}
}
