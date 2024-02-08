class Solution {

/**
 * @param Integer[] $nums
 * @return Boolean
 */
function containsDuplicate($nums) {
    $count = array_count_values($nums);
    foreach ($count as $value) {
        if ($value > 1) {
            return true;
        }
    }
    return false;
}
}
