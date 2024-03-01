class Solution {

/**
 * @param Integer[][] $matrix
 * @return Integer[][]
 */
function transpose($matrix) {
    $rows = count($matrix);
    $cols = count($matrix[0]);
    
    $result = [];
    for ($i = 0; $i < $cols; $i++) {
        $temp = [];
        for ($j = 0; $j < $rows; $j++) {
            $temp[] = $matrix[$j][$i];
        }
        $result[] = $temp;
    }
    
    return $result;
}
}
