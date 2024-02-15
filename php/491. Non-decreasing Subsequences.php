class Solution {
    /**
     * @param Integer[] $nums
     * @return Integer[][]
     */
    function findSubsequences($nums) {
        $result = [];
        $temp = [];
        $this->backtrack($nums, $result, $temp, 0);
        return $result;
    }
    
    function backtrack($nums, &$result, &$temp, $start) {
        if (count($temp) > 1) {
            $result[] = $temp;
        }
        
        $used = [];
        for ($i = $start; $i < count($nums); $i++) {
            if (empty($temp) || $nums[$i] >= end($temp)) {
                if (isset($used[$nums[$i]])) continue;
                
                $temp[] = $nums[$i];
                $this->backtrack($nums, $result, $temp, $i + 1);
                array_pop($temp);
                
                $used[$nums[$i]] = true;
            }
        }
    }
}
