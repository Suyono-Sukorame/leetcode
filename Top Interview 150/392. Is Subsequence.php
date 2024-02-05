class Solution {

/**
 * @param String $s
 * @param String $t
 * @return Boolean
 */
function isSubsequence($s, $t) {
    $sLen = strlen($s);
    $tLen = strlen($t);
    
    $i = 0;
    $j = 0;
    
    while ($i < $sLen && $j < $tLen) {
        if ($s[$i] == $t[$j]) {
            $i++;
        }
        $j++;
    }
    
    return $i == $sLen;
}
}
