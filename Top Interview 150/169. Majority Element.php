class Solution {

function majorityElement($nums) {
    $candidate = null;
    $count = 0;

    foreach ($nums as $num) {
        if ($count == 0) {
            $candidate = $num;
        }
        $count += ($num == $candidate) ? 1 : -1;
    }

    return $candidate;
}
}

$solution = new Solution();
echo $solution->majorityElement([3,2,3]);
echo $solution->majorityElement([2,2,1,1,1,2,2]);
