class Solution {

function exclusiveTime($n, $logs) {
    $stack = [];
    $result = array_fill(0, $n, 0);
    
    $prevTime = 0;
    
    foreach ($logs as $log) {
        list($id, $type, $time) = explode(':', $log);
        $id = (int) $id;
        $time = (int) $time;
        
        if ($type === 'start') {
            if (!empty($stack)) {
                $result[end($stack)] += $time - $prevTime;
            }
            $stack[] = $id;
            $prevTime = $time;
        } else {
            $result[array_pop($stack)] += $time - $prevTime + 1;
            $prevTime = $time + 1;
        }
    }
    
    return $result;
}
}
