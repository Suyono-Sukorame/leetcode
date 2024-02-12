class Solution {

/**
 * @param String $s
 * @param String $t
 * @return String
 */
function findTheDifference($s, $t) {
    $countS = array_count_values(str_split($s));
    $countT = array_count_values(str_split($t));
    
    foreach ($countT as $char => $count) {
        if (!isset($countS[$char]) || $countT[$char] > $countS[$char]) {
            return $char;
        }
    }
    
    return "";
}
}
