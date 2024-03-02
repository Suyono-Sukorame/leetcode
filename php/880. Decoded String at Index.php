class Solution {

/**
 * @param String $s
 * @param Integer $k
 * @return String
 */
function decodeAtIndex($s, $k) {
    $size = 0;
    $length = strlen($s);

    for ($i = 0; $i < $length; $i++) {
        if (is_numeric($s[$i])) {
            $size *= intval($s[$i]);
        } else {
            $size++;
        }
    }

    for ($i = $length - 1; $i >= 0; $i--) {
        $k %= $size;
        if ($k == 0 && ctype_alpha($s[$i])) {
            return $s[$i];
        }
        if (is_numeric($s[$i])) {
            $size /= intval($s[$i]);
        } else {
            $size--;
        }
    }

    return "";
}
}
