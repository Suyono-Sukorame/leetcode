class Solution {

/**
 * @param String $s
 * @return Boolean
 */
function repeatedSubstringPattern($s) {
    $n = strlen($s);
    
    for ($len = 1; $len <= $n / 2; $len++) {
        if ($n % $len != 0) continue;
        
        $substring = substr($s, 0, $len);
        $valid = true;
        
        for ($i = $len; $i < $n; $i += $len) {
            $nextSub = substr($s, $i, $len);
            if ($nextSub !== $substring) {
                $valid = false;
                break;
            }
        }
        
        if ($valid) return true;
    }
    
    return false;
}
}
