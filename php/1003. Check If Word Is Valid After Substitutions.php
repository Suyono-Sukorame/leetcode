class Solution {

/**
 * @param String $s
 * @return Boolean
 */
function isValid($s) {
    $stack = [];
    
    for ($i = 0; $i < strlen($s); $i++) {
        $char = $s[$i];
        
        if ($char == 'c') {
            if (end($stack) == 'b' && prev($stack) == 'a') {
                array_pop($stack);
                array_pop($stack);
            } else {
                return false;
            }
        } else {
            array_push($stack, $char);
        }
    }
    
    return empty($stack);
}
}

$solution = new Solution();
echo $solution->isValid("aabcbc");
