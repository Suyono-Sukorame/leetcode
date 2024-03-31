class Solution {
    /**
     * @param Integer $x
     * @return Integer
     */
    function sumOfTheDigitsOfHarshadNumber($x) {
        $sum = 0;
        $num = $x;
        
        while ($num > 0) {
            $sum += $num % 10;
            $num = (int)($num / 10);
        }
        
        if ($x % $sum == 0) {
            return $sum;
        } else {
            return -1;
        }
    }
}
