class Solution {

/**
 * @param String $s
 * @return String
 */
function minRemoveToMakeValid($s) {
    $stack = []; 
    $removeIndices = []; 
    
    for ($i = 0; $i < strlen($s); $i++) {
        if ($s[$i] == '(') {
            array_push($stack, $i);
        } elseif ($s[$i] == ')') {
            if (empty($stack)) {
                array_push($removeIndices, $i);
            } else {
                array_pop($stack); 
            }
        }
    }
    
    while (!empty($stack)) {
        array_push($removeIndices, array_pop($stack));
    }
    
    $result = '';
    for ($i = 0; $i < strlen($s); $i++) {
        if (!in_array($i, $removeIndices)) {
            $result .= $s[$i];
        }
    }
    
    return $result;
}
}
