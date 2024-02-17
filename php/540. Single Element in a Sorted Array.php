class Solution {

/**
 * @param Integer[] $nums
 * @return Integer
 */
function singleNonDuplicate($nums) {
    $left = 0;
    $right = count($nums) - 1;
    
    while ($left < $right) {
        $mid = $left + intval(($right - $left) / 2);
        
        $even = ($right - $mid) % 2 === 0;
        
        if ($nums[$mid] === $nums[$mid - 1]) {
            if ($even) {
                $right = $mid - 2;
            } else {
                $left = $mid + 1;
            }
        } elseif ($nums[$mid] === $nums[$mid + 1]) {
            if ($even) {
                $left = $mid + 2;
            } else {
                $right = $mid - 1;
            }
        } else {
            return $nums[$mid];
        }
    }
    
    return $nums[$left];
}
}
