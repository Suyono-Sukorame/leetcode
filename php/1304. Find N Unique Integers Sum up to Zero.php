class Solution {

/**
 * @param Integer $n
 * @return Integer[]
 */
function sumZero($n) {
    $result = [];
    $start = -floor($n / 2); 
    $end = floor($n / 2); 

    if ($n % 2 != 0) {
        $result[] = 0;
    }

    for ($i = $start; $i <= $end; $i++) {
        if ($i != 0) {
            $result[] = $i;
        }
    }

    return $result;
}
}
