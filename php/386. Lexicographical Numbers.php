class Solution {

/**
 * @param Integer $n
 * @return Integer[]
 */
function lexicalOrder($n) {
    $result = array();
    $current = 1;
    for ($i = 1; $i <= $n; $i++) {
        $result[] = $current;
        if ($current * 10 <= $n) {
            $current *= 10;
        } elseif ($current % 10 != 9 && $current + 1 <= $n) {
            $current++;
        } else {
            while (($current / 10) % 10 == 9) {
                $current /= 10;
            }
            $current = intdiv($current, 10) + 1;
        }
    }
    return $result;
}
}
