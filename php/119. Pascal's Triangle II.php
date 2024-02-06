class Solution {

/**
 * @param Integer $rowIndex
 * @return Integer[]
 */
function getRow($rowIndex) {
    $row = array_fill(0, $rowIndex + 1, 1);
    
    for ($i = 0; $i <= $rowIndex; $i++) {
        for ($j = $i - 1; $j > 0; $j--) {
            $row[$j] += $row[$j - 1];
        }
    }
    
    return $row;
}
}
