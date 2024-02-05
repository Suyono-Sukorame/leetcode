class Solution {

/**
 * @param String $s
 * @return Boolean
 */
function isPalindrome($s) {
    $s = strtolower($s);
    $s = preg_replace('/[^a-z0-9]/', '', $s);
    
    $length = strlen($s);
    $left = 0;
    $right = $length - 1;
    
    while ($left < $right) {
        if ($s[$left] != $s[$right]) {
            return false;
        }
        $left++;
        $right--;
    }
    
    return true;
}
}
