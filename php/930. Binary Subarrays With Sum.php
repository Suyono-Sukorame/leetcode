class Solution {

/**
 * @param Integer[] $nums
 * @param Integer $goal
 * @return Integer
 */
function numSubarraysWithSum($nums, $goal) {
    $count = 0;
    $sum = 0;
    $prefixSum = [0 => 1];

    foreach ($nums as $num) {
        $sum += $num;
        $count += $prefixSum[$sum - $goal] ?? 0;
        $prefixSum[$sum] = ($prefixSum[$sum] ?? 0) + 1;
    }

    return $count;
}
}