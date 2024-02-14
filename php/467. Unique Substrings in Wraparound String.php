class Solution {

/**
 * @param String $s
 * @return Integer
 */
function findSubstringInWraproundString($s) {
    $count = array_fill(0, 26, 0); 
    $length = strlen($s);
    $maxLength = 0; 
    for ($i = 0; $i < $length; $i++) {
        if ($i > 0 && (ord($s[$i]) - ord($s[$i - 1]) == 1 || ($s[$i] == 'a' && $s[$i - 1] == 'z'))) {
            $maxLength++;
        } else {
            $maxLength = 1; 
        }
        $index = ord($s[$i]) - ord('a');
        $count[$index] = max($count[$index], $maxLength);
    }
    return array_sum($count);
}
}
