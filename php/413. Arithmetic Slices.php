class Solution {

/**
 * @param Integer[] $nums
 * @return Integer
 */
function numberOfArithmeticSlices($nums) {
    $count = 0;
    $dp = array_fill(0, count($nums), 0);
    
    for ($i = 2; $i < count($nums); $i++) {
        if ($nums[$i] - $nums[$i - 1] == $nums[$i - 1] - $nums[$i - 2]) {
            $dp[$i] = $dp[$i - 1] + 1;
            $count += $dp[$i];
        }
    }
    
    return $count;
}
}

$solution = new Solution();
echo $solution->numberOfArithmeticSlices([1,2,3,4]); // Output: 3
echo $solution->numberOfArithmeticSlices([1]); // Output: 0
