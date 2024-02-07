class Solution {

/**
 * @param String $s
 * @return String
 */
function shortestPalindrome($s) {
    $rev = strrev($s);
    $len = strlen($s);
    
    for ($i = 0; $i < $len; $i++) {
        if (substr($s, 0, $len - $i) == substr($rev, $i)) {
            return substr($rev, 0, $i) . $s;
        }
    }
    
    return '';
}
}
