class Solution {

/**
 * @param Integer $columnNumber
 * @return String
 */
function convertToTitle($columnNumber) {
    $title = '';
    
    while ($columnNumber > 0) {
        $columnNumber--;
        $remainder = $columnNumber % 26;
        $title = chr($remainder + ord('A')) . $title;
        $columnNumber = intval($columnNumber / 26);
    }
    
    return $title;
}
}

// Test cases
$solution = new Solution();
echo $solution->convertToTitle(1) . "\n"; // Output: "A"
echo $solution->convertToTitle(28) . "\n"; // Output: "AB"
echo $solution->convertToTitle(701) . "\n"; // Output: "ZY"
