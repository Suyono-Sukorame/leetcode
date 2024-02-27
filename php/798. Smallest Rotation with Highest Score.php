class Solution {
    /**
     * @param Integer[] $nums
     * @return Integer
     */
    function bestRotation($nums) {
        $n = count($nums);
        $loss = array_fill(0, $n, 0);
        
        for ($i = 0; $i < $n; $i++) {
            $loss[($i - $nums[$i] + 1 + $n) % $n]--;
        }
        
        $res = 0;
        
        for ($i = 1; $i < $n; $i++) {
            $loss[$i] += $loss[$i - 1] + 1;
            $res = ($loss[$i] > $loss[$res]) ? $i : $res;
        }
        
        return $res;
    }
}
