class Solution {

/**
 * @param String $s
 * @return String
 */
function freqAlphabets($s) {
    $result = "";
    $i = 0;
    while ($i < strlen($s)) {
        if ($i + 2 < strlen($s) && $s[$i + 2] == '#') {
            $num = intval(substr($s, $i, 2));
            $result .= chr($num + 96);
            $i += 3;
        } else {
            $num = intval($s[$i]);
            $result .= chr($num + 96);
            $i++;
        }
    }
    return $result;
}
}
