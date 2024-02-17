class Solution {
    /**
     * @param Integer[] $nums
     * @return Integer
     */
    function maxOperations($nums) {
        $score = $nums[0] + $nums[1];
        $i = 2;
        while ($i < count($nums) - 1 && $nums[$i] + $nums[$i + 1] == $score) {
            $i += 2;
        }
        return $i >> 1;
    }
}