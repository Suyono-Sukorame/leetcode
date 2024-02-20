class Solution {

/**
 * @param Integer $c
 * @return Boolean
 */
function judgeSquareSum($c) {
    for ($a = 0; $a * $a <= $c; $a++) {
        $b = sqrt($c - $a * $a);
        
        if ((int)$b == $b) {
            return true;
        }
    }
    
    return false;
}
}
