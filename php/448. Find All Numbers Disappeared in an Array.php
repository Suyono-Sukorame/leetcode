class Solution {

/**
 * @param Integer[] $nums
 * @return Integer[]
 */
function findDisappearedNumbers($nums) {
    $n = count($nums);
    
    foreach ($nums as $num) {
        $index = abs($num) - 1;
        if ($nums[$index] > 0) {
            $nums[$index] *= -1;
        }
    }
    
    $missingNumbers = [];
    for ($i = 0; $i < $n; $i++) {
        if ($nums[$i] > 0) {
            $missingNumbers[] = $i + 1;
        }
    }
    
    return $missingNumbers;
}
}
