class Solution {

/**
 * @param String $s
 * @return String
 */
function lastNonEmptyString($s) {
    $charIndex = [];
    
    for ($i = 0; $i < strlen($s); $i++) {
        $char = $s[$i];
        if (!isset($charIndex[$char])) {
            $charIndex[$char] = $i;
        }
    }
    
    asort($charIndex);
    
    $firstChar = key($charIndex);
    
    $result = '';
    for ($i = 0; $i < strlen($s); $i++) {
        if ($s[$i] != $firstChar) {
            $result .= $s[$i];
        }
    }
    
    return $result;
}
}

$solution = new Solution();
$s1 = "aabcbbca";
echo $solution->lastNonEmptyString($s1);

$s2 = "abcd";
echo $solution->lastNonEmptyString($s2);
