class Solution {

/**
 * @param Integer[] $nums
 * @return Integer[][]
 */
function permuteUnique($nums) {
    sort($nums);
    $result = [];
    $used = [];
    $this->dfs($nums, [], $used, $result);
    return $result;
}

function dfs($nums, $currentPermutation, &$used, &$result) {
    if (count($currentPermutation) == count($nums)) {
        $result[] = $currentPermutation;
        return;
    }
    
    for ($i = 0; $i < count($nums); $i++) {
        if ($used[$i] || ($i > 0 && $nums[$i] == $nums[$i - 1] && !$used[$i - 1])) {
            continue;
        }
        $used[$i] = true;
        $this->dfs($nums, array_merge($currentPermutation, [$nums[$i]]), $used, $result);
        $used[$i] = false;
    }
}
}

$solution = new Solution();
$nums1 = [1, 1, 2];
$nums2 = [1, 2, 3];

print_r($solution->permuteUnique($nums1)); // Output: [[1,1,2],[1,2,1],[2,1,1]]
print_r($solution->permuteUnique($nums2)); // Output: [[1,2,3],[1,3,2],[2,1,3],[2,3,1],[3,1,2],[3,2,1]]
