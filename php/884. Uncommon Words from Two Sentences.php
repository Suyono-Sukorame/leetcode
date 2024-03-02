class Solution {

/**
 * @param String $s1
 * @param String $s2
 * @return String[]
 */
function uncommonFromSentences($s1, $s2) {
    $string1 = explode(' ', $s1);
    $string2 = explode(' ', $s2);
    $string = array_merge($string1, $string2);
    $result = array();
    foreach ($string as $s) {
        if (array_count_values($string)[$s] == 1) {
            $result[] = $s;
        }
    }
    return $result;
}
}
