class Solution {

/**
 * @param Integer $num
 * @return String
 */
function convertToBase7($num) {
    if ($num == 0) return "0";
    
    $isNegative = $num < 0;
    $num = abs($num);
    
    $result = "";
    
    while ($num > 0) {
        $remainder = $num % 7;
        $result = $remainder . $result;
        $num = intdiv($num, 7);
    }
    
    if ($isNegative) {
        $result = "-" . $result;
    }
    
    return $result;
}
}
