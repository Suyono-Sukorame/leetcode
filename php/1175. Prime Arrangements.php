class Solution {

/**
 * @param Integer $n
 * @return Integer
 */
function numPrimeArrangements($n) {
    $mod = 1000000007;
    $primes = $this->countPrimes($n + 1);
    
    $nonPrimes = $n - $primes;
    
    $primePermutations = $this->factorial($primes, $mod);
    $nonPrimePermutations = $this->factorial($nonPrimes, $mod);
    
    return ($primePermutations * $nonPrimePermutations) % $mod;
}

function countPrimes($n) {
    if ($n <= 2) return 0;
    
    $count = 0;
    $isPrime = array_fill(0, $n, true);
    $isPrime[0] = false;
    $isPrime[1] = false;
    
    for ($i = 2; $i * $i < $n; $i++) {
        if ($isPrime[$i]) {
            for ($j = $i * $i; $j < $n; $j += $i) {
                $isPrime[$j] = false;
            }
        }
    }
    
    for ($i = 2; $i < $n; $i++) {
        if ($isPrime[$i]) $count++;
    }
    
    return $count;
}

function factorial($n, $mod) {
    $result = 1;
    for ($i = 2; $i <= $n; $i++) {
        $result = ($result * $i) % $mod;
    }
    return $result;
}
}
