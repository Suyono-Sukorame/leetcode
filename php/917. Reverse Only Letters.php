class Solution {

/**
 * @param String $s
 * @return String
 */
function reverseOnlyLetters($s) {
    $letters = [];
    $n = strlen($s);
    
    for ($i = 0; $i < $n; $i++) {
        if (ctype_alpha($s[$i])) {
            $letters[] = $s[$i];
        }
    }
    
    $letters = array_reverse($letters);
    
    $result = '';
    $j = 0;
    for ($i = 0; $i < $n; $i++) {
        if (ctype_alpha($s[$i])) {
            $result .= $letters[$j++];
        } else {
            $result .= $s[$i];
        }
    }
    
    return $result;
}
}
