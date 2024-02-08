class Solution {

/**
 * @param String $num
 * @return Boolean
 */
function isAdditiveNumber($num) {
    $n = strlen($num);
    for ($i = 1; $i <= intval($n / 2); $i++) {
        if ($i > 1 && $num[0] == '0') break;
        for ($j = 1; $i + $j < $n; $j++) {
            if ($j > 1 && $num[$i] == '0') break;
            $num1 = substr($num, 0, $i);
            $num2 = substr($num, $i, $j);
            if ($this->isValid($num1, $num2, $num, $i + $j)) return true;
        }
    }
    return false;
}

function isValid($num1, $num2, $num, $start) {
    $n = strlen($num);
    while ($start < $n) {
        $sum = (string)((int)$num1 + (int)$num2);
        if (!strpos($num, $sum, $start) === $start) return false;
        $start += strlen($sum);
        $num1 = $num2;
        $num2 = $sum;
    }
    return true;
}
}
