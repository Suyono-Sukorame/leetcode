class Solution {

/**
 * @param Integer[] $nums
 * @return Integer
 */
function returnToBoundaryCount($nums) {
    $boundaryCount = 0; 
    $position = 0; 
    
    foreach ($nums as $num) {
        if ($num < 0) {
            $position -= abs($num);
        } else {
            $position += $num;
        }
        
        if ($position == 0) {
            $boundaryCount++;
        }
    }
    
    return $boundaryCount;
}
}
