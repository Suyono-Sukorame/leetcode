class Solution {

/**
 * @param Integer $num
 * @return Boolean
 */
function checkPerfectNumber($num) {
    if ($num <= 1) { return false; }
    $divisorsSum = 0;
    for ($i = 1; $i <= floor(sqrt($num)); $i++) {
        if ($num % $i === 0) {
            $divisorsSum += $i + $num / $i;
        }
    }
    return $divisorsSum === 2 * $num ? true : false;
}
}
