class Solution {

/**
 * @param Integer $num
 * @return Boolean
 */
function isPerfectSquare($num) {
    if ($num < 2) return true;
    
    $left = 2;
    $right = $num;
    
    while ($left <= $right) {
        $mid = $left + intdiv($right - $left, 2);
        $midSquared = $mid * $mid;
        
        if ($midSquared == $num) {
            return true;
        } elseif ($midSquared < $num) {
            $left = $mid + 1;
        } else {
            $right = $mid - 1;
        }
    }
    
    return false;
}
}
