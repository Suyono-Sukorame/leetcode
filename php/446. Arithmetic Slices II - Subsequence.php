class Solution {

/**
 * @param Integer[] $nums
 * @return Integer
 */
function numberOfArithmeticSlices($nums) {
    $total = 0;
    $n = count($nums);
    $dp = array_fill(0, $n, array());

    for ($i = 1; $i < $n; $i++) {
        for ($j = 0; $j < $i; $j++) {
            $diff = $nums[$i] - $nums[$j];
            $dp[$i][$diff] += isset($dp[$j][$diff]) ? $dp[$j][$diff] + 1 : 1;
            $total += isset($dp[$j][$diff]) ? $dp[$j][$diff] : 0;
        }
    }

    return $total;
}
}

$obj = new Solution();
$nums = [2, 4, 6, 8, 10];
echo $obj->numberOfArithmeticSlices($nums); // Output: 7
