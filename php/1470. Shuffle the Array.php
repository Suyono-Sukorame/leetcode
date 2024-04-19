class Solution {

/**
 * @param Integer[] $nums
 * @param Integer $n
 * @return Integer[]
 */
function shuffle($nums, $n) {
    $result = [];
    for ($i = 0; $i < $n; $i++) {
        $result[] = $nums[$i];
        $result[] = $nums[$i + $n];
    }
    return $result;
}
}
