class Solution {

/**
 * @param Integer $num
 * @return String
 */
function toHex($num) {
    if ($num == 0) return "0"; 
    
    $hexDigits = "0123456789abcdef";
    $result = "";
    
    if ($num < 0) $num += 4294967296;
    
    while ($num > 0) {
        $remainder = $num % 16;
        $result = $hexDigits[$remainder] . $result;
        $num = intval($num / 16);
    }
    
    return $result;
}
}
