class Solution {

/**
 * @param Integer[] $nums
 * @param Integer $k
 * @return Integer
 */
function minKBitFlips($nums, $k) {
    $n = count($nums);
    $flipCount = 0;
    $flipQueue = [];

    for ($i = 0; $i < $n; $i++) {
        if (!empty($flipQueue) && $flipQueue[0] + $k == $i) {
            array_shift($flipQueue);
        }

        if (($nums[$i] == 0 && count($flipQueue) % 2 == 0) || ($nums[$i] == 1 && count($flipQueue) % 2 == 1)) {
            if ($i + $k > $n) {
                return -1;
            }
            $flipCount++;
            array_push($flipQueue, $i);
        }
    }
    return $flipCount;
}
}
