class Solution {

/**
 * @param Integer $left
 * @param Integer $right
 * @return Integer
 */
function countPrimeSetBits($left, $right) {
    $countSetBits = function($num) {
        $count = 0;
        while ($num > 0) {
            if ($num & 1) {
                $count++;
            }
            $num >>= 1;
        }
        return $count;
    };
    
    $isPrime = function($n) {
        if ($n <= 1) {
            return false;
        }
        for ($i = 2; $i <= sqrt($n); $i++) {
            if ($n % $i === 0) {
                return false;
            }
        }
        return true;
    };
    
    $count = 0;
    for ($i = $left; $i <= $right; $i++) {
        $setBits = $countSetBits($i);
        if ($isPrime($setBits)) {
            $count++;
        }
    }
    return $count;
}
}
