class Solution {

/**
 * @param String $s
 * @return Integer
 */
function longestValidParentheses($s) {
    $max_length = 0;
    $stack = new SplStack();
    $stack->push(-1);
    
    for ($i = 0; $i < strlen($s); $i++) {
        if ($s[$i] == '(') {
            $stack->push($i);
        } else {
            $stack->pop();
            if ($stack->isEmpty()) {
                $stack->push($i);
            } else {
                $max_length = max($max_length, $i - $stack->top());
            }
        }
    }
    
    return $max_length;
}
}

$solution = new Solution();
echo $solution->longestValidParentheses("(()"); // Output: 2
echo $solution->longestValidParentheses(")()())"); // Output: 4
echo $solution->longestValidParentheses(""); // Output: 0
