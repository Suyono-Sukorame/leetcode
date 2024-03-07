class Solution {

/**
 * @param Integer[] $nums
 * @param Integer $k
 * @return Integer
 */
function subarraysDivByK($nums, $k) {
    $count = 0;
    $prefixSum = 0;
    $remainderFrequency = array_fill(0, $k, 0);
    $remainderFrequency[0] = 1;

    foreach ($nums as $num) {
        $prefixSum += $num;
        $remainder = ($prefixSum % $k + $k) % $k;
        $count += $remainderFrequency[$remainder];
        $remainderFrequency[$remainder]++;
    }

    return $count;
}
}
