class Solution extends VersionControl {
    /**
     * @param Integer $n
     * @return Integer
     */
    function firstBadVersion($n) {
        $left = 1;
        $right = $n;
        
        while ($left < $right) {
            $mid = $left + intval(($right - $left) / 2);
            
            if ($this->isBadVersion($mid)) {
                $right = $mid;
            } else {
                $left = $mid + 1;
            }
        }
        
        return $left;
    }
}
