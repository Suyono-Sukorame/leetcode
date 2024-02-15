class Solution {

/**
 * @param Integer[] $timeSeries
 * @param Integer $duration
 * @return Integer
 */
function findPoisonedDuration($timeSeries, $duration) {
    $n = count($timeSeries);
    if ($n == 0) return 0;
    
    $totalDuration = 0;
    for ($i = 1; $i < $n; $i++) {
        $totalDuration += min($timeSeries[$i] - $timeSeries[$i - 1], $duration);
    }
    $totalDuration += $duration;
    
    return $totalDuration;
}
}
