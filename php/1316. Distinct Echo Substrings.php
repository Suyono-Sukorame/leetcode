class Solution {

/**
 * @param String $text
 * @return Integer
 */
function distinctEchoSubstrings($text) {
    $n = strlen($text);
    $result = array();
    
    for ($i = 0; $i < $n; $i++) {
        for ($len = 1; $i + 2 * $len <= $n; $len++) {
            $sub = substr($text, $i, $len);
            $next = substr($text, $i + $len, $len);
            
            if ($sub === $next) {
                $result[$sub] = true;
            }
        }
    }
    
    return count($result);
}
}
