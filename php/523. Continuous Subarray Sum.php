class Solution {

/**
 * @param Integer[] $nums
 * @param Integer $k
 * @return Boolean
 */
function checkSubarraySum($nums, $k) {
    $n = count($nums);
    $prefixSum = 0;
    $remainderMap = [0 => -1];

    for ($i = 0; $i < $n; $i++) {
        $prefixSum += $nums[$i];
        if ($k != 0) {
            $prefixSum %= $k;
        }
        if (array_key_exists($prefixSum, $remainderMap)) {
            if ($i - $remainderMap[$prefixSum] > 1) {
                return true;
            }
        } else {
            $remainderMap[$prefixSum] = $i;
        }
    }

    return false;
}
}