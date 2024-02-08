class Solution {

/**
 * @param Integer[] $nums
 * @return Integer
 */
function missingNumber($nums) {
    $n = count($nums);
    $expectedSum = ($n * ($n + 1)) / 2;
    $actualSum = array_sum($nums);
    return $expectedSum - $actualSum;
}
}
