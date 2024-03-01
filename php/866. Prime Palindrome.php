class Solution {

/**
 * @param Integer $n
 * @return Integer
 */
function primePalindrome($n) {
    while (true) {
        if ($this->isPalindrome($n) && $this->isPrime($n)) {
            return $n;
        }
        $n++;
        if ($n > 10000000 && $n < 100000000) {
            $n = 100000000;
        }
    }
}

function isPalindrome($num) {
    $str = strval($num);
    return $str === strrev($str);
}

function isPrime($num) {
    if ($num < 2) return false;
    if ($num == 2) return true;
    if ($num % 2 == 0) return false;
    for ($i = 3; $i <= sqrt($num); $i += 2) {
        if ($num % $i == 0) return false;
    }
    return true;
}
}
