class Solution {

/**
 * @param String $s
 * @return Integer[]
 */
function diStringMatch($s) {
    $n = strlen($s);
    $result = [];
    $low = 0;
    $high = $n;
    
    for ($i = 0; $i <= $n; $i++) {
        if ($i == $n) {
            $result[] = $low;
        } elseif ($s[$i] == 'I') {
            $result[] = $low++;
        } else {
            $result[] = $high--;
        }
    }
    
    return $result;
}
}
