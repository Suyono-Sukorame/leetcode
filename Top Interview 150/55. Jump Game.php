class Solution {

function canJump($nums) {
    $maxReach = 0;

    for ($i = 0; $i < count($nums); $i++) {
        if ($i > $maxReach) {
            return false;
        }
        $maxReach = max($maxReach, $i + $nums[$i]);
    }

    return true;
}
}

$solution = new Solution();
echo $solution->canJump([2,3,1,1,4]); // Output: true
echo $solution->canJump([3,2,1,0,4]); // Output: false
