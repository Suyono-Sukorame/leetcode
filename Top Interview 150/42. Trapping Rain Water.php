class Solution {

function trap($height) {
    $n = count($height);
    $leftMax = $rightMax = $result = 0;
    $left = 0;
    $right = $n - 1;

    while ($left < $right) {
        if ($height[$left] < $height[$right]) {
            $minMax = $height[$left];
            while ($left < $right && $height[$left] <= $minMax) {
                $result += $minMax - $height[$left];
                $left++;
            }
        } else {
            $minMax = $height[$right];
            while ($left < $right && $height[$right] <= $minMax) {
                $result += $minMax - $height[$right];
                $right--;
            }
        }
    }

    return $result;
}
}

$solution = new Solution();
echo $solution->trap([0,1,0,2,1,0,1,3,2,1,2,1]); // Output: 6
echo $solution->trap([4,2,0,3,2,5]); // Output: 9
