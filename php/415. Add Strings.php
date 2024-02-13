class Solution {

/**
 * @param String $num1
 * @param String $num2
 * @return String
 */
function addStrings($num1, $num2) {
    $result = '';
    $carry = 0;
    $i = strlen($num1) - 1;
    $j = strlen($num2) - 1;
    
    while ($i >= 0 || $j >= 0 || $carry > 0) {
        $digit1 = $i >= 0 ? (int)$num1[$i] : 0;
        $digit2 = $j >= 0 ? (int)$num2[$j] : 0;
        $sum = $digit1 + $digit2 + $carry;
        $carry = (int)($sum / 10);
        $result = ($sum % 10) . $result;
        $i--;
        $j--;
    }
    
    return $result;
}
}

// Test cases
$solution = new Solution();
echo $solution->addStrings("11", "123") . "\n"; // Output: "134"
echo $solution->addStrings("456", "77") . "\n"; // Output: "533"
echo $solution->addStrings("0", "0") . "\n"; // Output: "0"
