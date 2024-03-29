class Solution {
    /**
     * @param Integer[] $nums
     * @param Integer $k
     * @return Integer
     */
    function countSubarrays($nums, $k) {
        $maxElement = max($nums);
        $ans = 0;
        $start = 0;
        $maxElementsInWindow = 0;

        for ($end = 0; $end < count($nums); $end++) {
            if ($nums[$end] == $maxElement) {
                $maxElementsInWindow++;
            }
            while ($k == $maxElementsInWindow) {
                if ($nums[$start] == $maxElement) {
                    $maxElementsInWindow--;
                }
                $start++;
            }
            $ans += $start;
        }

        return $ans;
    }
}
