class Solution {
    /**
     * @param Integer $n
     * @return Integer
     */
    function findNthDigit($n) {
        $start = 1;
        $size = 1;
        $count = 9;

        while ($n > $size * $count) {
            $n -= $size * $count;
            $size++;
            $count *= 10;
            $start *= 10;
        }

        $start += ($n - 1) / $size;
        
        $num = strval($start);
        return intval($num[($n - 1) % $size]);
    }
}
