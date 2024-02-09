class Solution {

/**
 * @param Integer[] $nums
 * @return Integer[]
 */
function countSmaller($nums) {
    $n = count($nums);
    $result = array_fill(0, $n, 0);
    $sorted = [];
    for ($i = $n - 1; $i >= 0; $i--) {
        $num = $nums[$i];
        $index = $this->binarySearch($sorted, $num);
        $result[$i] = $index;
        array_splice($sorted, $index, 0, $num);
    }
    return $result;
}

function binarySearch(&$sorted, $target) {
    $left = 0;
    $right = count($sorted) - 1;
    while ($left <= $right) {
        $mid = (int)($left + ($right - $left) / 2);
        if ($sorted[$mid] < $target) {
            $left = $mid + 1;
        } else {
            $right = $mid - 1;
        }
    }
    return $left;
}
}
