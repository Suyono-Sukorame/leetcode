class Solution {
    /**
     * @param Integer[] $nums
     * @param Integer $left
     * @param Integer $right
     * @return Integer
     */
    function numSubarrayBoundedMax($nums, $left, $right) {
        $count = 0;
        $start = -1;
        $end = -1;
        
        for ($i = 0; $i < count($nums); $i++) {
            if ($nums[$i] > $right) {
                $start = $end = $i;
            } elseif ($nums[$i] >= $left) {
                $end = $i;
            }
            $count += ($end - $start);
        }
        
        return $count;
    }
}
