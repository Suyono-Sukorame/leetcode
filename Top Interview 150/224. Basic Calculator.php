class Solution {

/**
 * @param String $s
 * @return Integer
 */
function calculate($s) {
    $stack = [];
    $currentNumber = 0;
    $result = 0;
    $sign = 1;

    for ($i = 0; $i < strlen($s); $i++) {
        $char = $s[$i];

        if ($char >= '0' && $char <= '9') {
            $currentNumber = $currentNumber * 10 + intval($char);
        } else if ($char === '+') {
            $result += $sign * $currentNumber;
            $currentNumber = 0;
            $sign = 1;
        } else if ($char === '-') {
            $result += $sign * $currentNumber;
            $currentNumber = 0;
            $sign = -1;
        } else if ($char === '(') {
            array_push($stack, $result);
            array_push($stack, $sign);
            $result = 0;
            $sign = 1;
        } else if ($char === ')') {
            $result += $sign * $currentNumber;
            $currentNumber = 0;
            $result *= array_pop($stack);
            $result += array_pop($stack);
        }
    }

    $result += $sign * $currentNumber;

    return $result;
}
}

// Example usage:
$solution = new Solution();
echo $solution->calculate("1 + 1") . PHP_EOL; // Output: 2
echo $solution->calculate(" 2-1 + 2 ") . PHP_EOL; // Output: 3
echo $solution->calculate("(1+(4+5+2)-3)+(6+8)") . PHP_EOL; // Output: 23
