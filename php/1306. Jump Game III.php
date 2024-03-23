class Solution {

/**
 * @param Integer[] $arr
 * @param Integer $start
 * @return Boolean
 */
function canReach($arr, $start) {
    $visited = array_fill(0, count($arr), false);
    $queue = [$start];
    
    while (!empty($queue)) {
        $current = array_shift($queue);
        $visited[$current] = true;
        
        if ($arr[$current] == 0) {
            return true;
        }
        
        $jump1 = $current + $arr[$current];
        $jump2 = $current - $arr[$current];
        
        if ($jump1 >= 0 && $jump1 < count($arr) && !$visited[$jump1]) {
            array_push($queue, $jump1);
        }
        if ($jump2 >= 0 && $jump2 < count($arr) && !$visited[$jump2]) {
            array_push($queue, $jump2);
        }
    }
    
    return false;
}
}
