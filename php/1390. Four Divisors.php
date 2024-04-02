class Solution {

/**
 * @param Integer[] $nums
 * @return Integer
 */
function sumFourDivisors($nums) {
    $sum = 0;
    foreach ($nums as $number) {
        $sum += $this->findSumDivisor($number);
    }
    return $sum;
}

function findSumDivisor($number) {
    $count = 0;
    $sum = $number + 1;
    for ($i = 2; $i * $i <= $number; $i++) {
        if ($number % $i == 0) {
            if ($number / $i == $i) {
                return 0;
            } else {
                $sum += $i + $number / $i;
                $count += 2;
            }
        }
    }
    return $count == 2 ? $sum : 0;
}
}
