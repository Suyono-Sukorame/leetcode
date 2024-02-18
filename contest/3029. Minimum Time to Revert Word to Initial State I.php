class Solution {

/**
 * @param String $word
 * @param Integer $k
 * @return Integer
 */
function minimumTimeToInitialState($word, $k) {
    $length = strlen($word);
    $repeat = $length - $k;
    
    $i = 0;
    while (true) {
        $i++;

        $head = substr($word, 0, $repeat);
        $foot = substr($word, $length - $repeat, $repeat);
        $repeat -= $k;
        if ($head == $foot) {
            break;
        }

        if ($i * $k > $length) {
            break;
        }
    }
    return $i;
}
}