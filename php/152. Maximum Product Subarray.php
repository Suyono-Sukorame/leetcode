class Solution {

/**
 * @param Integer[] $nums
 * @return Integer
 */
function maxProduct($nums) {
    $n = count($nums);
    if ($n === 0) return 0;

    $maxProduct = $minProduct = $result = $nums[0];

    for ($i = 1; $i < $n; $i++) {
        if ($nums[$i] < 0) {
            $temp = $maxProduct;
            $maxProduct = $minProduct;
            $minProduct = $temp;
        }

        $maxProduct = max($nums[$i], $maxProduct * $nums[$i]);
        $minProduct = min($nums[$i], $minProduct * $nums[$i]);

        $result = max($result, $maxProduct);
    }

    return $result;
}
}
