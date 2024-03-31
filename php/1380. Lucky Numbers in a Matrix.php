class Solution {

/**
 * @param Integer[][] $matrix
 * @return Integer[]
 */
function luckyNumbers($matrix) {
    $luckyNumbers = [];
    
    foreach ($matrix as $row) {
        $minInRow = min($row);
        $minIndex = array_search($minInRow, $row);
        $isMaxInColumn = true;
        foreach ($matrix as $r) {
            if ($r[$minIndex] > $minInRow) {
                $isMaxInColumn = false;
                break;
            }
        }
        if ($isMaxInColumn) {
            $luckyNumbers[] = $minInRow;
        }
    }
    
    return $luckyNumbers;
}
}
