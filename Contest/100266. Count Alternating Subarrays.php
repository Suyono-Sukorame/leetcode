class Solution {
    function countAlternatingSubarrays($nums) {
        $count = 0;
        $length = count($nums);
        
        for ($i = 0; $i < $length; $i++) {
            $j = $i;
            while ($j + 1 < $length && $nums[$j] != $nums[$j + 1]) {
                $j++;
            }
            $count += ($j - $i + 1) * ($j - $i + 2) / 2;
            $i = $j;
        }
        
        return $count;
    }
}
