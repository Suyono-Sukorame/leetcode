class Solution {

/**
 * @param String $s
 * @param Integer $k
 * @return String
 */
function licenseKeyFormatting($s, $k) {
    $s = str_replace("-", "", strtoupper($s));
    $len = strlen($s);
    $firstGroupLen = $len % $k;
    
    $result = substr($s, 0, $firstGroupLen);
    if ($firstGroupLen > 0 && $len > $firstGroupLen) {
        $result .= "-";
    }
    
    for ($i = $firstGroupLen; $i < $len; $i += $k) {
        $result .= substr($s, $i, $k);
        if ($i + $k < $len) {
            $result .= "-";
        }
    }
    
    return $result;
}
}
