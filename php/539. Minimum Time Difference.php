class Solution {
    /**
     * @param String[] $timePoints
     * @return Integer
     */
    function findMinDifference($timePoints) {
        sort($timePoints);
        $minDiff = PHP_INT_MAX;
        
        for ($i = 1; $i < count($timePoints); $i++) {
            $diff = $this->getTimeDifference($timePoints[$i], $timePoints[$i - 1]);
            $minDiff = min($minDiff, $diff);
        }
        
        $diff1 = $this->getTimeDifference($timePoints[0], $timePoints[count($timePoints) - 1]);
        $diff2 = $this->getTimeDifference($timePoints[0], $this->addHours($timePoints[count($timePoints) - 1], 24));
        return min($minDiff, $diff1, $diff2);
    }
    
    function getTimeDifference($time1, $time2) {
        list($hour1, $min1) = explode(':', $time1);
        list($hour2, $min2) = explode(':', $time2);
        $diff = abs(($hour1 - $hour2) * 60 + $min1 - $min2);
        return min($diff, 1440 - $diff);
    }
    
    function addHours($time, $hours) {
        list($hour, $min) = explode(':', $time);
        $hour = ($hour + $hours) % 24;
        return sprintf("%02d:%02d", $hour, $min);
    }
}
