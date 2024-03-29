class Solution {

/**
 * @param Integer[] $arr
 * @return Integer
 */
function peakIndexInMountainArray($arr) {
    $left = 0;
    $right = count($arr) - 1;
    
    while ($left < $right) {
        $mid = $left + floor(($right - $left) / 2);
        
        if ($arr[$mid] < $arr[$mid + 1]) {
            $left = $mid + 1;
        } else {
            $right = $mid;
        }
    }
    
    return $left;
}
}
