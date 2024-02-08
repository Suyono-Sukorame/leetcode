class Solution {

/**
 * @param Integer $n
 * @return Integer
 */
function countDigitOne($n) {
    $count = 0;
    $factor = 1;
    
    while ($factor <= $n) {
        $dividend = floor($n / $factor);
        $remainder = $n % $factor;
        
        $count += floor(($dividend + 8) / 10) * $factor;
        
        if ($dividend % 10 === 1) {
            $count += $remainder + 1;
        }
        
        $factor *= 10;
    }
    
    return $count;
}
}
