class Solution {

/**
 * @param Integer $num
 * @return String
 */
function numberToWords($num) {
    if ($num == 0) return "Zero";
    
    $singles = array("", "One", "Two", "Three", "Four", "Five", "Six", "Seven", "Eight", "Nine");
    $teens = array("Ten", "Eleven", "Twelve", "Thirteen", "Fourteen", "Fifteen", "Sixteen", "Seventeen", "Eighteen", "Nineteen");
    $tens = array("", "Ten", "Twenty", "Thirty", "Forty", "Fifty", "Sixty", "Seventy", "Eighty", "Ninety");
    $thousands = array("", "Thousand", "Million", "Billion");
    
    $result = "";
    $index = 0;
    
    while ($num > 0) {
        if ($num % 1000 != 0) {
            $part = $this->helper($num % 1000, $singles, $teens, $tens);
            $part .= $thousands[$index] . " ";
            $result = $part . $result;
        }
        $num /= 1000;
        $index++;
    }
    
    return trim($result);
}

function helper($num, $singles, $teens, $tens) {
    $result = "";
    
    if ($num >= 100) {
        $result .= $singles[(int)($num / 100)] . " Hundred ";
        $num %= 100;
    }
    
    if ($num >= 20) {
        $result .= $tens[(int)($num / 10)] . " ";
        $num %= 10;
    }
    
    if ($num > 0) {
        if ($num < 10) {
            $result .= $singles[$num] . " ";
        } else {
            $result .= $teens[$num - 10] . " ";
        }
    }
    
    return $result;
}
}
