class Solution {

/**
 * @param Integer[] $nums
 * @return Integer[]
 */
function largestDivisibleSubset($nums) {
    if (empty($nums)) return [];
    
    sort($nums);
    
    $n = count($nums);
    $dp = array_fill(0, $n, 1);
    $prev = array_fill(0, $n, -1);
    
    $maxLen = 1;
    $maxIndex = 0;
    
    for ($i = 1; $i < $n; $i++) {
        for ($j = 0; $j < $i; $j++) {
            if ($nums[$i] % $nums[$j] === 0 && $dp[$j] + 1 > $dp[$i]) {
                $dp[$i] = $dp[$j] + 1;
                $prev[$i] = $j;
                if ($dp[$i] > $maxLen) {
                    $maxLen = $dp[$i];
                    $maxIndex = $i;
                }
            }
        }
    }
    
    $subset = [];
    while ($maxIndex != -1) {
        $subset[] = $nums[$maxIndex];
        $maxIndex = $prev[$maxIndex];
    }
    
    return array_reverse($subset);
}
}
