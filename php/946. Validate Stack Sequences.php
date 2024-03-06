class Solution {

function validateStackSequences($pushed, $popped) {
    $stack = [];
    $i = 0;
    
    foreach ($pushed as $num) {
        array_push($stack, $num);
        
        while (!empty($stack) && end($stack) == $popped[$i]) {
            array_pop($stack);
            $i++;
        }
    }
    
    return empty($stack);
}
}
