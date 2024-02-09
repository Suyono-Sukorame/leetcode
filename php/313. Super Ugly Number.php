class Solution {

/**
 * @param Integer $n
 * @param Integer[] $primes
 * @return Integer
 */
function nthSuperUglyNumber($n, $primes) {
    $ugly = array_fill(0, $n, 0);
    $ugly[0] = 1;
    $indices = array_fill(0, count($primes), 0);

    for ($i = 1; $i < $n; $i++) {
        $nextUgly = PHP_INT_MAX;
        for ($j = 0; $j < count($primes); $j++) {
            $nextUgly = min($nextUgly, $primes[$j] * $ugly[$indices[$j]]);
        }
        for ($j = 0; $j < count($primes); $j++) {
            if ($primes[$j] * $ugly[$indices[$j]] === $nextUgly) {
                $indices[$j]++;
            }
        }
        $ugly[$i] = $nextUgly;
    }

    return $ugly[$n - 1];
}
}
