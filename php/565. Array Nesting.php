class Solution {

/**
 * @param Integer[] $nums
 * @return Integer
 */
function arrayNesting($nums) {
    $maxLength = 0;
    $visited = array();
    for ($i = 0; $i < count($nums); $i++) {
        $length = 0;
        $index = $i;
        $val = 0;
        while (!isset($visited[$nums[$index]])) {
            $val = $nums[$index];
            $visited[$val] = true;
            $index = $val;
            $length++;
        }
        $maxLength = max($maxLength, $length);
    }
    return $maxLength;
}
}
