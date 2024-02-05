class Solution {

function romanToInt($s) {
    $romanToIntMap = [
        'I' => 1,
        'V' => 5,
        'X' => 10,
        'L' => 50,
        'C' => 100,
        'D' => 500,
        'M' => 1000
    ];

    $result = 0;
    $prevValue = 0;

    for ($i = strlen($s) - 1; $i >= 0; $i--) {
        $currentValue = $romanToIntMap[$s[$i]];

        if ($currentValue < $prevValue) {
            $result -= $currentValue;
        } else {
            $result += $currentValue;
        }

        $prevValue = $currentValue;
    }

    return $result;
}
}

$solution = new Solution();
echo $solution->romanToInt("III"); // Output: 3
echo $solution->romanToInt("LVIII"); // Output: 58
echo $solution->romanToInt("MCMXCIV"); // Output: 1994
