class Solution {

/**
 * @param Integer $n
 * @return Integer
 */
function findIntegers($n) {
    $fib = [1, 2];
    for ($i = 2; $i <= 30; $i++) {
        $fib[$i] = $fib[$i - 1] + $fib[$i - 2];
    }
    
    $bits = decbin($n);
    $len = strlen($bits);
    $res = 0;
    
    for ($i = 0; $i < $len; $i++) {
        if ($bits[$i] == '1') {
            $res += $fib[$len - $i - 1];
            if ($i > 0 && $bits[$i - 1] == '1') {
                break;
            }
        }
        if ($i == $len - 1) {
            $res++;
        }
    }
    
    return $res;
}
}
