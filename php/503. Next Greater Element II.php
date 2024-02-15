class Solution {

/**
 * @param Integer[] $nums
 * @return Integer[]
 */
function nextGreaterElements($nums) {
    $n = count($nums);
    $stack = [];
    $result = array_fill(0, $n, -1);

    for ($i = 0; $i < 2 * $n; $i++) {
        while (!empty($stack) && $nums[$i % $n] > $nums[end($stack)]) {
            $result[array_pop($stack)] = $nums[$i % $n];
        }
        array_push($stack, $i % $n);
    }
    
    return $result;
}
}
