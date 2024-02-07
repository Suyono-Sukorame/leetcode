class Solution {

/**
 * @param Integer $n
 * @return Integer
 */
function countPrimes($n) {
    if ($n <= 2) {
        return 0;
    }
    
    $isPrime = array_fill(0, $n, true);
    $isPrime[0] = $isPrime[1] = false;
    
    for ($i = 2; $i * $i < $n; $i++) {
        if ($isPrime[$i]) {
            for ($j = $i * $i; $j < $n; $j += $i) {
                $isPrime[$j] = false;
            }
        }
    }
    
    return count(array_filter($isPrime));
}
}
