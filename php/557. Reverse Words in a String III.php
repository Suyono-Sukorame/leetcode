class Solution {

/**
 * @param String $s
 * @return String
 */
function reverseWords($s) {
    $words = explode(" ", $s);
    $result = [];
    foreach ($words as $word) {
        $result[] = strrev($word);
    }
    return implode(" ", $result);
}
}
