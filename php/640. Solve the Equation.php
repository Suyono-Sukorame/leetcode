class Solution {

/**
 * @param String $equation
 * @return String
 */
function solveEquation($equation) {
    $split = explode("=", $equation);
    $left = $this->solve($split[0]);
    $right = $this->solve($split[1]);

    $x = $left[0] - $right[0];
    $y = $right[1] - $left[1];

    if ($x == 0) {
        if ($y == 0)
            return "Infinite solutions";
        else
            return "No solution";
    }
    return "x=" . ($y / $x);
}

private function solve($s) {
    $res = array(0, 0);
    $sign = '+';
    $num = 0;
    $isNum = false;
    $s = $s . "+";
    foreach (str_split($s) as $ch) {
        if (ctype_digit($ch)) {
            $num = $num * 10 + ($ch - '0');
            $isNum = true;
        } elseif ($ch == 'x') {
            $n = $isNum ? $num : 1;
            $res[0] += $sign == '-' ? -$n : $n;
            $isNum = false;
            $num = 0; 
        } elseif ($ch == '+' || $ch == '-') {
            $res[1] += $sign == '-' ? -1 * $num : $num;
            $isNum = false;
            $num = 0;
            $sign = $ch; 
        }
    }
    return $res;
}
}
