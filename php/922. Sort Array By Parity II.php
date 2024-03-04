class Solution {

/**
 * @param Integer[] $nums
 * @return Integer[]
 */
function sortArrayByParityII($nums) {
    $n = count($nums);
    $i = 0;
    $j = 1;
    while ($i < $n && $j < $n) {
        if ($nums[$i] % 2 == 0) {
            $i += 2;
        } elseif ($nums[$j] % 2 == 1) {
            $j += 2;
        } else {
            $temp = $nums[$i];
            $nums[$i] = $nums[$j];
            $nums[$j] = $temp;
        }
    }
    return $nums;
}
}
