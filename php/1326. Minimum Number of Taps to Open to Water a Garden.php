class Solution {
    function minTaps($n, $ranges) {
        $cloudsByStart = new MinPriorityQueue();
        $cloudsByStart->setExtractFlags(3);
        foreach($ranges as $x => $range){
            if($range != 0) {
                $length = $range + $range;
                $cloudsByStart->insert($length, $x-$range);
            }
        }
        
        $opened = 0;
        
        for($x = 0; $x <= $n; $x++){
            $longestCoveringCloudEnd = null;
            while (!$cloudsByStart->isEmpty() && $cloudsByStart->top()['priority'] <= $x) {
                $earliestCloud = $cloudsByStart->extract();
                $earliestCloudStart = $earliestCloud['priority'];
                $earliestCloudLength = $earliestCloud['data'];
                if($x >= $earliestCloudStart && $x <= $earliestCloudStart+$earliestCloudLength) {
                    if(is_null($longestCoveringCloudEnd) || $earliestCloudStart + $earliestCloudLength > $longestCoveringCloudEnd)
                        $longestCoveringCloudEnd = $earliestCloudStart + $earliestCloudLength;
                }
            }
            
            if(is_null($longestCoveringCloudEnd))
                return -1;
            
            $opened++;
                        
            $x = $longestCoveringCloudEnd - 1;
            
            if($x >= $n - 1) {
                break;
            }
            
        }
        
        return $opened;
    }
}

class MinPriorityQueue extends SplPriorityQueue {
    function compare($a,$b){
        return $b-$a;
    }
}
