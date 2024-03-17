class Solution {

/**
 * @param Integer[] $hours
 * @return Integer
 */
function longestWPI($hours) {
    $n = count($hours);
    
    for ($i = 0; $i < $n; $i++) {
        $hours[$i] = ($hours[$i] > 8) ? 1 : -1;
    }
    
    $prefixSum = 0;
    $indexMap = [];
    $maxIntervalLength = 0;
    
    for ($i = 0; $i < $n; $i++) {
        $prefixSum += $hours[$i];
        
        if ($prefixSum > 0) {
            $maxIntervalLength = $i + 1;
        } else {
            if (!isset($indexMap[$prefixSum])) {
                $indexMap[$prefixSum] = $i;
            }
            
            if (isset($indexMap[$prefixSum - 1])) {
                $maxIntervalLength = max($maxIntervalLength, $i - $indexMap[$prefixSum - 1]);
            }
        }
    }
    
    return $maxIntervalLength;
}
}
