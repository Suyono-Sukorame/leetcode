class Solution {

/**
 * @param Integer[] $nums
 * @param Integer $indexDiff
 * @param Integer $valueDiff
 * @return Boolean
 */
function containsNearbyAlmostDuplicate($nums, $indexDiff, $valueDiff) {
    $n = count($nums);
    
    $buckets = [];
    
    for ($i = 0; $i < $n; $i++) {
        $bucket = floor($nums[$i] / ($valueDiff + 1));
        
        if (isset($buckets[$bucket]) ||
            (isset($buckets[$bucket - 1]) && abs($nums[$i] - $buckets[$bucket - 1]) <= $valueDiff) ||
            (isset($buckets[$bucket + 1]) && abs($nums[$i] - $buckets[$bucket + 1]) <= $valueDiff)) {
            return true;
        }
        
        $buckets[$bucket] = $nums[$i];
        
        if ($i >= $indexDiff) {
            unset($buckets[floor($nums[$i - $indexDiff] / ($valueDiff + 1))]);
        }
    }
    
    return false;
}
}
