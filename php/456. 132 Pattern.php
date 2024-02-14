class Solution {

/**
 * @param Integer[] $nums
 * @return Boolean
 */
function find132pattern($nums) {
    $n = count($nums);
if ($n < 3) return false;
$stack = [];
$s3 = PHP_INT_MIN;
for ($i = $n - 1; $i >= 0; $i--) {
    if ($nums[$i] < $s3) return true;
    while (!empty($stack) && $nums[$i] > $stack[count($stack) - 1]) {
        $s3 = array_pop($stack);
    }
    $stack[] = $nums[$i];
}
return false;
}
}