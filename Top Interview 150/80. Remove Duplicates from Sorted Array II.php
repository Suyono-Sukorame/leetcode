class Solution {

/**
 * @param Integer[] $nums
 * @return Integer
 */
function removeDuplicates(&$nums) {
    $count = count($nums);

    if ($count <= 2) {
        return $count;
    }

    $k = 2; // Maximum allowed occurrences

    for ($i = 2; $i < $count; $i++) {
        if ($nums[$i] !== $nums[$k - 2]) {
            $nums[$k++] = $nums[$i];
        }
    }

    return $k;
}
}
