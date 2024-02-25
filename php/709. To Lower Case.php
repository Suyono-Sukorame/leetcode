class Solution {

/**
 * @param String $s
 * @return String
 */
function toLowerCase($s) {
    $lowercase = '';
    $length = strlen($s);
    for ($i = 0; $i < $length; $i++) {
        $char = $s[$i];
        if ($char >= 'A' && $char <= 'Z') {
            $lowercase .= chr(ord($char) + 32);
        } else {
            $lowercase .= $char;
        }
    }
    return $lowercase;
}
}

$obj = new Solution();
echo $obj->toLowerCase("Hello");