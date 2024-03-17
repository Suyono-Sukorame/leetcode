class Solution {

/**
 * @param Integer[] $arr
 * @return Integer
 */
function mctFromLeafValues($arr) {
    $stack = [];
    $result = 0;
    
    foreach ($arr as $value) {
        while (!empty($stack) && $stack[count($stack) - 1] <= $value) {
            $mid = array_pop($stack);
            if (!empty($stack)) {
                $result += $mid * min($stack[count($stack) - 1], $value);
            } else {
                $result += $mid * $value;
            }
        }
        $stack[] = $value;
    }
    
    while (count($stack) > 1) {
        $result += array_pop($stack) * $stack[count($stack) - 1];
    }
    
    return $result;
}
}
