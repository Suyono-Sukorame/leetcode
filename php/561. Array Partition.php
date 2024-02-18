class Solution {

/**
 * @param Integer[] $nums
 * @return Integer
 */
function arrayPairSum($nums) {
    sort($nums);
    $res = 0;
    for ($i = 0; $i < count($nums); $i++) {
        if ($i % 2 != 0) {
            $res += min($nums[$i], $nums[$i - 1]);
        }
    }
    return $res;
}
}
