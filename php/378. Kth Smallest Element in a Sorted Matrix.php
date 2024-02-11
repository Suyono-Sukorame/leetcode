class Solution {

/**
 * @param Integer[][] $matrix
 * @param Integer $k
 * @return Integer
 */
function kthSmallest($matrix, $k) {
    $n = count($matrix);
    $left = $matrix[0][0];
    $right = $matrix[$n - 1][$n - 1];
    
    while ($left < $right) {
        $mid = $left + floor(($right - $left) / 2);
        $count = $this->countSmallerOrEqual($matrix, $mid);
        
        if ($count < $k) {
            $left = $mid + 1;
        } else {
            $right = $mid;
        }
    }
    
    return $left;
}

function countSmallerOrEqual($matrix, $target) {
    $count = 0;
    $row = count($matrix) - 1;
    $col = 0;
    
    while ($row >= 0 && $col < count($matrix[0])) {
        if ($matrix[$row][$col] <= $target) {
            $count += $row + 1;
            $col++;
        } else {
            $row--;
        }
    }
    
    return $count;
}
}
