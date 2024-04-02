class Solution {

/**
 * @param String $s
 * @return String
 */
function longestPrefix($s) {
    $len = 0;
    $i = 1;
    $lps = array_fill(0, strlen($s), 0);
    
    while ($i < strlen($s)) {
        if ($s[$i] == $s[$len]) {
            $len++;
            $lps[$i] = $len;
            $i++;
        } else {
            if ($len != 0) {
                $len = $lps[$len - 1];
            } else {
                $lps[$i] = $len;
                $i++;
            }
        }
    }
    
    return substr($s, 0, $lps[strlen($s) - 1]);
}
}
