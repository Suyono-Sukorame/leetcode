class Solution {

/**
 * @param Integer[] $arr
 * @param Integer $k
 * @param Integer $threshold
 * @return Integer
 */
function numOfSubarrays($arr, $k, $threshold) {
    $count = 0;
    $sum = 0;

    for ($i = 0; $i < $k; $i++) {
        $sum += $arr[$i];
    }

    if ($sum / $k >= $threshold) {
        $count++;
    }

    for ($i = $k; $i < count($arr); $i++) {
        $sum += $arr[$i] - $arr[$i - $k];
        if ($sum / $k >= $threshold) {
            $count++;
        }
    }

    return $count;
}
}
