class Solution {

/**
 * @param Integer[] $nums
 * @return String
 */
function largestNumber($nums) {
    usort($nums, function($a, $b) {
        $ab = (string)$a . (string)$b;
        $ba = (string)$b . (string)$a;
        return strcmp($ba, $ab);
    });
    
    if ($nums[0] == 0) {
        return "0";
    }
    
    return implode("", $nums);
}
}

// Test cases
$solution = new Solution();
echo $solution->largestNumber([10, 2]) . "\n"; // Output: "210"
echo $solution->largestNumber([3, 30, 34, 5, 9]) . "\n"; // Output: "9534330"
