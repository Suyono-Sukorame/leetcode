class Solution {

/**
 * @param Integer[][] $mat
 * @return Integer[]
 */
function findDiagonalOrder($mat) {
    $m = count($mat);
    $n = count($mat[0]);
    $result = [];
    $row = 0;
    $col = 0;
    $direction = 1; // 1 for upward, -1 for downward
    
    for ($i = 0; $i < $m * $n; $i++) {
        $result[] = $mat[$row][$col];
        if ($direction == 1) {
            if ($col == $n - 1) {
                $row++;
                $direction = -1;
            } elseif ($row == 0) {
                $col++;
                $direction = -1;
            } else {
                $row--;
                $col++;
            }
        } else {
            if ($row == $m - 1) {
                $col++;
                $direction = 1;
            } elseif ($col == 0) {
                $row++;
                $direction = 1;
            } else {
                $row++;
                $col--;
            }
        }
    }
    
    return $result;
}
}
