class Solution {

/**
 * @param String[] $digits
 * @param Integer $n
 * @return Integer
 */
function atMostNGivenDigitSet($digits, $n) {
    $n_str = strval($n);
    $n_length = strlen($n_str);
    $d_length = count($digits);
    $result = 0;

    for ($i = 1; $i < $n_length; $i++) {
        $result += pow($d_length, $i);
    }

    for ($i = 0; $i < $n_length; $i++) {
        $less = false;
        for ($j = 0; $j < $d_length; $j++) {
            if ($digits[$j] < $n_str[$i]) {
                $result += pow($d_length, $n_length - $i - 1);
            } elseif ($digits[$j] == $n_str[$i]) {
                $less = true;
                break;
            }
        }
        if (!$less) {
            return $result;
        }
    }

    return $result + 1;
}
}
