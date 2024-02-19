class Solution {
    /**
     * @param Integer[] $nums
     * @param Integer $k
     * @return Integer
     */
    function smallestDistancePair($nums, $k) {
        sort($nums);
        
        $n = count($nums);
        $left = 0;
        $right = $nums[$n - 1] - $nums[0];
        
        while ($left < $right) {
            $mid = $left + intval(($right - $left) / 2);
            
            $count = $this->countPairs($nums, $mid);
            
            if ($count < $k) {
                $left = $mid + 1;
            } else {
                $right = $mid;
            }
        }
        
        return $left;
    }
    
    function countPairs($nums, $mid) {
        $count = 0;
        $left = 0;
        
        foreach ($nums as $right => $num) {
            while ($num - $nums[$left] > $mid) {
                $left++;
            }
            $count += $right - $left;
        }
        
        return $count;
    }
}
