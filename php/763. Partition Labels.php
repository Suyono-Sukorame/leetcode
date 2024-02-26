class Solution {

/**
 * @param String $s
 * @return Integer[]
 */
function partitionLabels($s) {
    $lastOccurrence = [];
    
    $length = strlen($s);
    for ($i = 0; $i < $length; $i++) {
        $lastOccurrence[$s[$i]] = $i;
    }
    
    $partitions = [];
    $start = 0;
    
    $end = 0;
    
    for ($i = 0; $i < $length; $i++) {
        $end = max($end, $lastOccurrence[$s[$i]]);
        
        if ($i == $end) {
            $partitions[] = $end - $start + 1;
            $start = $i + 1;
        }
    }
    
    return $partitions;
}
}
