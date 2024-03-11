class Solution {

/**
 * @param Integer[] $time
 * @return Integer
 */
function numPairsDivisibleBy60($time) {
    $count = array_fill(0, 60, 0);
    $result = 0;

    foreach ($time as $duration) {
        $remainder = $duration % 60;
        $complement = ($remainder == 0) ? 0 : 60 - $remainder;
        $result += $count[$complement];
        $count[$remainder]++;
    }

    return $result;
}
}
