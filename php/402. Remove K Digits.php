class Solution {

/**
 * @param String $num
 * @param Integer $k
 * @return String
 */
function removeKdigits($num, $k) {
    $stack = [];
    $n = strlen($num);
    
    for ($i = 0; $i < $n; $i++) {
        while (!empty($stack) && $k > 0 && $num[$i] < end($stack)) {
            array_pop($stack);
            $k--;
        }
        array_push($stack, $num[$i]);
    }
    
    while ($k > 0) {
        array_pop($stack);
        $k--;
    }
    
    $result = implode("", $stack);
    
    $result = ltrim($result, '0');
    
    return $result === "" ? "0" : $result;
}
}
