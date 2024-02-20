class Solution {

/**
 * @param Integer[][] $intervals
 * @return Integer
 */
function intersectionSizeTwo($intervals) {
    usort($intervals, function($a, $b) {
        return $a[1] != $b[1] ? $a[1] - $b[1] : $b[0] - $a[0];
    });
    
    $count = 0;
    $lastNums = [-1, -1];
    
    foreach ($intervals as $interval) {
        $start = $interval[0];
        $end = $interval[1];
        
        if ($start > $lastNums[1]) {
            $lastNums = [$end - 1, $end];
            $count += 2;
        }
        elseif ($start > $lastNums[0]) {
            $lastNums = [$lastNums[1], $end];
            $count++;
        }
    }
    
    return $count;
}
}
