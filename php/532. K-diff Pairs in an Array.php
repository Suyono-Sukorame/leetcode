class Solution {
    /**
     * @param Integer[] $nums
     * @param Integer $k
     * @return Integer
     */
    function findPairs($nums, $k) {
        if (empty($nums) || $k < 0) return 0;
        
        $myMap = [];
        $count = 0;

        foreach ($nums as $num) {
            $myMap[$num] = isset($myMap[$num]) ? $myMap[$num] + 1 : 1;
        }
        
        foreach ($myMap as $key => $value) {
            if ($k === 0) {
                if ($value > 1) $count++;
            } else {
                if (isset($myMap[$key + $k])) $count++;
            }
        }

        return $count;
    }
}
