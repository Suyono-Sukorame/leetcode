class Solution {

/**
 * @param String $s
 * @return String
 */
function reverseWords($s) {
    $arr = array_diff(explode(' ', trim($s)), ['']);
    $arr = array_reverse($arr);

    return implode(' ', $arr);
}
}

