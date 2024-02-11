class Solution {
    /**
     * @param Integer $n
     * @return Integer
     */
    function countNumbersWithUniqueDigits($n) {
        if ($n == 0) {
            return 1;
        }
        $count = 10; 
        $uniqueDigits = 9; 
        $availableNumbers = 9; 
        while ($n > 1 && $availableNumbers > 0) {
            $uniqueDigits *= $availableNumbers; 
            $count += $uniqueDigits;
            $availableNumbers--;
            $n--;
        }
        return $count;
    }
}
