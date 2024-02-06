class Solution {

/**
 * @param Integer $numRows
 * @return Integer[][]
 */
function generate($numRows) {
    $triangle = array();
    
    for ($i = 0; $i < $numRows; $i++) {
        $row = array();
        
        for ($j = 0; $j <= $i; $j++) {
            if ($j === 0 || $j === $i) {
                // At the beginning and end of each row, the value is 1
                $row[] = 1;
            } else {
                // For other positions, the value is the sum of the two numbers above it
                $row[] = $triangle[$i - 1][$j - 1] + $triangle[$i - 1][$j];
            }
        }
        
        $triangle[] = $row;
    }
    
    return $triangle;
}
}
