class Solution {

/**
 * @param Integer[] $nums
 * @return Integer[]
 */
function findDuplicates($nums) {
    $result = [];
    
    foreach ($nums as $num) {
        $index = abs($num) - 1;
        
        if ($nums[$index] < 0) {
            $result[] = abs($num);
        } else {
            $nums[$index] = -$nums[$index];
        }
    }
    
    return $result;
}
}
