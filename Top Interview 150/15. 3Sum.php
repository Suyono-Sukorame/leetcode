class Solution {

/**
 * @param Integer[] $nums
 * @return Integer[][]
 */
function threeSum($nums) {
    sort($nums);
    $result = [];

    for ($i = 0; $i < count($nums) - 2; $i++) {
        if ($i === 0 || ($i > 0 && $nums[$i] !== $nums[$i - 1])) {
            $start = $i + 1;
            $end = count($nums) - 1;
            $target = -$nums[$i];

            while ($start < $end) {
                $sum = $nums[$start] + $nums[$end];

                if ($sum === $target) {
                    $result[] = [$nums[$i], $nums[$start], $nums[$end]];

                    while ($start < $end && $nums[$start] === $nums[$start + 1]) $start++;
                    while ($start < $end && $nums[$end] === $nums[$end - 1]) $end--;

                    $start++;
                    $end--;
                } else if ($sum < $target) {
                    $start++;
                } else {
                    $end--;
                }
            }
        }
    }

    return $result;
}
}

$solution = new Solution();
print_r($solution->threeSum([-1, 0, 1, 2, -1, -4]));
print_r($solution->threeSum([0, 1, 1]));
print_r($solution->threeSum([0, 0, 0]));
