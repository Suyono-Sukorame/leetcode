class Solution {
    /**
     * @param Integer[] $arr
     * @return Integer
     */
    function longestMountain($arr) {
        $n = count($arr);
        $maxLength = 0;
        
        for ($i = 1; $i < $n - 1; $i++) {
            if ($arr[$i] > $arr[$i - 1] && $arr[$i] > $arr[$i + 1]) {
                $left = $i - 1;
                $right = $i + 1;
                
                while ($left > 0 && $arr[$left - 1] < $arr[$left]) {
                    $left--;
                }
                
                while ($right < $n - 1 && $arr[$right] > $arr[$right + 1]) {
                    $right++;
                }
                
                $length = $right - $left + 1;
                $maxLength = max($maxLength, $length);
            }
        }
        
        return $maxLength;
    }
}
