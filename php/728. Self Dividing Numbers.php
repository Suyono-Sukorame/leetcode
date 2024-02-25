class Solution {

/**
 * @param Integer $left
 * @param Integer $right
 * @return Integer[]
 */
function selfDividingNumbers($left, $right) {
    $result = [];
    for ($i = $left; $i <= $right; $i++) {
        if ($this->isSelfDividing($i)) {
            $result[] = $i;
        }
    }
    return $result;
}

/**
 * @param Integer $num
 * @return Boolean
 */
function isSelfDividing($num) {
    $originalNum = $num;
    while ($num > 0) {
        $digit = $num % 10;
        if ($digit == 0 || $originalNum % $digit !== 0) {
            return false;
        }
        $num = (int)($num / 10);
    }
    return true;
}
}
