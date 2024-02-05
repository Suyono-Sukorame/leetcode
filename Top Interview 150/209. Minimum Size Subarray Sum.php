class Solution {

/**
 * @param Integer $target
 * @param Integer[] $nums
 * @return Integer
 */
function minSubArrayLen($target, $nums) {
    $minLength = PHP_INT_MAX;
    $left = 0;
    $sum = 0;

    for ($right = 0; $right < count($nums); $right++) {
        $sum += $nums[$right];

        while ($sum >= $target) {
            $minLength = min($minLength, $right - $left + 1);
            $sum -= $nums[$left];
            $left++;
        }
    }

    return $minLength === PHP_INT_MAX ? 0 : $minLength;
}
}

$solution = new Solution();
echo $solution->minSubArrayLen(7, [2, 3, 1, 2, 4, 3]); // Output: 2
echo $solution->minSubArrayLen(11, [1, 1, 1, 1, 1, 1, 1, 1]); // Output: 0
