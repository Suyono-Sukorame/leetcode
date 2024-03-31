class Solution {

/**
 * @param Integer[] $nums
 * @param Integer $minK
 * @param Integer $maxK
 * @return Integer
 */
function countSubarrays($nums, $minK, $maxK) {
    $res = 0;
    $min = -1;
    $max = -1;
    $mix = -1;

    for ($i = 0; $i < count($nums); $i++) {
        if ($nums[$i] < $minK || $nums[$i] > $maxK) {
            $mix = $i;
        }
        if ($nums[$i] == $minK) {
            $min = $i;
        }
        if ($nums[$i] == $maxK) {
            $max = $i;
        }
        $res += max(0, min($max, $min) - $mix);
    }

    return $res;
}
}
