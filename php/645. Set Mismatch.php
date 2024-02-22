class Solution {

/**
 * @param Integer[] $nums
 * @return Integer[]
 */
function findErrorNums($nums) {
    $visited = array_fill(0, 10001, false);
    $duplicate = 0;
    $sum = 0;
    $n = count($nums);
    
    foreach ($nums as $num) {
        if ($visited[$num]) {
            $duplicate = $num;
        }
        $visited[$num] = true;
        $sum += $num;
    }
    
    $nsum = ($n * ($n + 1)) / 2;
    
    return [$duplicate, $duplicate + $nsum - $sum];
}
}
