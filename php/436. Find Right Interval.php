class Solution {

/**
 * @param Integer[][] $intervals
 * @return Integer[]
 */
function findRightInterval($intervals) {
    $result = [];
    $n = count($intervals);
    $startPoints = [];
    
    for ($i = 0; $i < $n; $i++) {
        $startPoints[$intervals[$i][0]] = $i;
    }
    
    ksort($startPoints);
    
    foreach ($intervals as $interval) {
        $targetEnd = $interval[1];
        $found = false;
        
        foreach ($startPoints as $start => $index) {
            if ($start >= $targetEnd) {
                $result[] = $index;
                $found = true;
                break;
            }
        }
        
        if (!$found) {
            $result[] = -1;
        }
    }
    
    return $result;
}
}
