class Solution {

/**
 * @param String $num
 * @return Boolean
 */
function isAdditiveNumber($num) {
    $n = strlen($num);
    for ($i = 1; $i <= intval($n / 2); ++$i) {
        if ($num[0] == '0' && $i > 1) return false;
        $x1 = substr($num, 0, $i);
        for ($j = 1; max($j, $i) <= $n - $i - $j; ++$j) {
            if ($num[$i] == '0' && $j > 1) break;
            $x2 = substr($num, $i, $j);
            if ($this->isValid($x1, $x2, $j + $i, $num)) return true;
        }
    }
    return false;
}

private function isValid($x1, $x2, $start, $num) {
    if ($start == strlen($num)) return true;
    $x2 = bcadd($x1, $x2);
    $x1 = bcsub($x2, $x1);
    $sum = $x2;
    if (strpos($num, $sum, $start) !== $start) return false;
    return $this->isValid($x1, $x2, $start + strlen($sum), $num);
}
}
