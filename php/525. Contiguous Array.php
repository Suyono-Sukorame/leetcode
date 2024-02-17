class Solution {

/**
 * @param Integer[] $nums
 * @return Integer
 */
function findMaxLength($nums) {
    $map = [0 => -1];
    $maxlen = 0;
    $count = 0;

    for ($i = 0; $i < count($nums); $i++) {
        $count += ($nums[$i] == 1) ? 1 : -1;

        if (array_key_exists($count, $map)) {
            $maxlen = max($maxlen, $i - $map[$count]);
        } else {
            $map[$count] = $i;
        }
    }

    return $maxlen;
}
}