class Solution {

// private $sorted;
// private $count;

/**
 * @param Integer[] $nums
 * @return Integer[]
 */
public function countSmaller($nums) {
    $n = count($nums);
    $counts = array_fill(0, $n, 0);
    $index_map = array_keys($nums);
    $sorted_nums = array_fill(0, $n, 0);
    $this->mergeSort($nums, $sorted_nums, $index_map, $counts, 0, $n - 1);
    return $counts;
}

private function mergeSort(&$nums, &$sorted_nums, &$index_map, &$counts, $left, $right) {
    if ($left >= $right) {
        return;
    }
    $mid = (int)(($left + $right) / 2);
    $this->mergeSort($nums, $sorted_nums, $index_map, $counts, $left, $mid);
    $this->mergeSort($nums, $sorted_nums, $index_map, $counts, $mid + 1, $right);
    $this->merge($nums, $sorted_nums, $index_map, $counts, $left, $mid, $right);
}

private function merge(&$nums, &$sorted_nums, &$index_map, &$counts, $left, $mid, $right) {
    $i = $left;
    $j = $mid + 1;
    $k = $left;
    $num_elements_right = 0;
    while ($i <= $mid && $j <= $right) {
        if ($nums[$index_map[$i]] <= $nums[$index_map[$j]]) {
            $sorted_nums[$k] = $index_map[$i];
            $counts[$index_map[$i]] += $num_elements_right;
            $i++;
        } else {
            $sorted_nums[$k] = $index_map[$j];
            $num_elements_right++;
            $j++;
        }
        $k++;
    }
    while ($i <= $mid) {
        $sorted_nums[$k] = $index_map[$i];
        $counts[$index_map[$i]] += $num_elements_right;
        $i++;
        $k++;
    }
    while ($j <= $right) {
        $sorted_nums[$k] = $index_map[$j];
        $j++;
        $k++;
    }
    for ($k = $left; $k <= $right; $k++) {
        $index_map[$k] = $sorted_nums[$k];
    }
}
}