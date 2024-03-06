class Solution {

/**
 * @param Integer $n
 * @param Integer $k
 * @return Integer[]
 */
function numsSameConsecDiff($n, $k) {
    $result = array();
    
    if ($n == 1) {
        return range(0, 9);
    }
    
    for ($i = 1; $i <= 9; $i++) {
        $this->dfs($i, $n - 1, $k, $result);
    }
    
    return $result;
}

function dfs($num, $n, $k, &$result) {
    if ($n == 0) {
        $result[] = $num;
        return;
    }
    
    $lastDigit = $num % 10;
    if ($lastDigit + $k < 10) {
        $this->dfs($num * 10 + $lastDigit + $k, $n - 1, $k, $result);
    }
    if ($k != 0 && $lastDigit - $k >= 0) {
        $this->dfs($num * 10 + $lastDigit - $k, $n - 1, $k, $result);
    }
}
}
