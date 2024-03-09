class Solution {

/**
 * @param Integer $a
 * @param Integer $b
 * @return String
 */
function strWithout3a3b($a, $b) {
    $result = '';
    
    while ($a > 0 || $b > 0) {
        if ($a > $b) {
            if (strlen($result) >= 2 && $result[strlen($result) - 1] == 'a' && $result[strlen($result) - 2] == 'a') {
                $result .= 'b';
                $b--;
            } else {
                $result .= 'a';
                $a--;
            }
        } 
        elseif ($b > $a) {
            if (strlen($result) >= 2 && $result[strlen($result) - 1] == 'b' && $result[strlen($result) - 2] == 'b') {
                $result .= 'a';
                $a--;
            } else {
                $result .= 'b';
                $b--;
            }
        } 
        else {
            if ($result[strlen($result) - 1] == 'a') {
                $result .= 'b';
                $b--;
            } else {
                $result .= 'a';
                $a--;
            }
        }
    }
    
    return $result;
}
}
