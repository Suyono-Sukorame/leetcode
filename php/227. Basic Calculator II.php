class Solution {
    /**
     * @param String $s
     * @return Integer
     */
    function calculate($s) {
        $stack = [];
        $num = 0;
        $sign = '+';
        
        for ($i = 0; $i < strlen($s); $i++) {
            $char = $s[$i];
            if (ctype_digit($char)) {
                $num = $num * 10 + intval($char);
            }
            if ((!ctype_digit($char) && $char != ' ') || $i == strlen($s) - 1) {
                if ($sign == '+') {
                    array_push($stack, $num);
                } elseif ($sign == '-') {
                    array_push($stack, -$num);
                } elseif ($sign == '*') {
                    $stack[count($stack) - 1] = $stack[count($stack) - 1] * $num;
                } elseif ($sign == '/') {
                    $stack[count($stack) - 1] = intval($stack[count($stack) - 1] / $num);
                }
                $sign = $char;
                $num = 0;
            }
        }
        return array_sum($stack);
    }
}
