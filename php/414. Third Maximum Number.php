class Solution {

/**
 * @param Integer[] $nums
 * @return Integer
 */
function thirdMax($nums) {
    $first = $second = $third = PHP_INT_MIN;
    
    foreach ($nums as $num) {
        if ($num > $first) {
            $third = $second;
            $second = $first;
            $first = $num;
        } elseif ($num > $second && $num < $first) {
            $third = $second;
            $second = $num;
        } elseif ($num > $third && $num < $second) {
            $third = $num;
        }
    }
    
    return ($third != PHP_INT_MIN) ? $third : $first;
}
}

$solution = new Solution();
echo $solution->thirdMax([3,2,1]); // Output: 1
echo $solution->thirdMax([1,2]); // Output: 2
echo $solution->thirdMax([2,2,3,1]); // Output: 1
