class Solution {

function jump($nums) {
    $n = count($nums);
    $curMax = $nextMax = $jumps = 0;

    for ($i = 0; $i < $n - 1; $i++) {
        $nextMax = max($nextMax, $i + $nums[$i]);
        
        if ($i == $curMax) {
            $curMax = $nextMax;
            $jumps++;
        }
    }

    return $jumps;
}
}

$solution = new Solution();
echo $solution->jump([2,3,1,1,4]); // Output: 2
echo $solution->jump([2,3,0,1,4]); // Output: 2
