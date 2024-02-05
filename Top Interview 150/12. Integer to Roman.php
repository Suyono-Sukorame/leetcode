class Solution {

function intToRoman($num) {
    $intToRomanMap = [
        1000 => 'M',
        900 => 'CM',
        500 => 'D',
        400 => 'CD',
        100 => 'C',
        90 => 'XC',
        50 => 'L',
        40 => 'XL',
        10 => 'X',
        9 => 'IX',
        5 => 'V',
        4 => 'IV',
        1 => 'I'
    ];

    $result = '';

    foreach ($intToRomanMap as $value => $roman) {
        while ($num >= $value) {
            $result .= $roman;
            $num -= $value;
        }
    }

    return $result;
}
}

$solution = new Solution();
echo $solution->intToRoman(3); // Output: "III"
echo $solution->intToRoman(58); // Output: "LVIII"
echo $solution->intToRoman(1994); // Output: "MCMXCIV"
