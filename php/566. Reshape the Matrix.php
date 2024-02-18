class Solution {

/**
 * @param Integer[][] $mat
 * @param Integer $r
 * @param Integer $c
 * @return Integer[][]
 */
function matrixReshape($mat, $r, $c) {
    $rows = count($mat);
    $cols = count($mat[0]);
    
    if ($rows * $cols != $r * $c) {
        return $mat;
    }

    $result = array_fill(0, $r, array_fill(0, $c, 0));
    $rowIndex = 0;
    $colIndex = 0;

    for ($i = 0; $i < $rows; $i++) {
        for ($j = 0; $j < $cols; $j++) {
            $result[$rowIndex][$colIndex] = $mat[$i][$j];
            $colIndex++;

            if ($colIndex == $c) {
                $colIndex = 0;
                $rowIndex++;
            }
        }
    }

    return $result;
}
}
