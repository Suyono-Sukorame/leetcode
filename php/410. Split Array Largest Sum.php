class Solution {

/**
 * @param Integer[] $nums
 * @param Integer $k
 * @return Integer
 */
function splitArray($nums, $k) {
    $left = max($nums);
    $right = array_sum($nums);
    
    while ($left < $right) {
        $mid = $left + floor(($right - $left) / 2);
        if ($this->isValid($nums, $k, $mid)) {
            $right = $mid;
        } else {
            $left = $mid + 1;
        }
    }
    
    return $left;
}

function isValid($nums, $k, $target) {
    $count = 0;
    $sum = 0;
    foreach ($nums as $num) {
        $sum += $num;
        if ($sum > $target) {
            $count++;
            $sum = $num;
        }
    }
    $count++;
    return $count <= $k;
}
}

$solution = new Solution();
echo $solution->splitArray([7,2,5,10,8], 2); // Output: 18
echo $solution->splitArray([1,2,3,4,5], 2); // Output: 9
