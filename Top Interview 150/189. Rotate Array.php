class Solution {

function rotate(&$nums, $k) {
    $k = $k % count($nums);
    $nums = array_merge(array_slice($nums, -$k), array_slice($nums, 0, -$k));
}
}

$solution = new Solution();
$arr1 = [1, 2, 3, 4, 5, 6, 7];
$solution->rotate($arr1, 3);
print_r($arr1); // Output: [5, 6, 7, 1, 2, 3, 4]

$arr2 = [-1, -100, 3, 99];
$solution->rotate($arr2, 2);
print_r($arr2); // Output: [3, 99, -1, -100]
