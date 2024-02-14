class Solution {

/**
 * @param Integer[] $nums
 * @return Integer
 */
function totalHammingDistance($nums) {
    $n = count($nums);
    $totalHammingDistance = 0;
    
    for ($i = 0; $i < 32; $i++) {
        $countOnes = 0;
        foreach ($nums as $num) {
            $countOnes += ($num >> $i) & 1;
        }
        $totalHammingDistance += $countOnes * ($n - $countOnes);
    }
    
    return $totalHammingDistance;
}
}
