class Solution {

/**
 * @param Integer $n
 * @return Integer
 */
function integerReplacement($n) {
    return $this->helper($n, 0);
}

function helper($n, $steps) {
    if ($n == 1) {
        return $steps;
    }
    
    if ($n % 2 == 0) {
        return $this->helper($n / 2, $steps + 1);
    } else {
        return min($this->helper($n + 1, $steps + 1), $this->helper($n - 1, $steps + 1));
    }
}
}
