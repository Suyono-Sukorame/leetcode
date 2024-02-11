class Solution {

/**
 * @param Integer[][] $grid
 * @return Integer
 */
function cherryPickup($grid) {
    $rows = count($grid);
    $cols = count($grid[0]);
    
    $dp = [];
    for ($i = 0; $i < $rows; $i++) {
        for ($j = 0; $j < $cols; $j++) {
            for ($k = 0; $k < $cols; $k++) {
                $dp[$i][$j][$k] = -1;
            }
        }
    }
    
    return $this->dfs($grid, $rows, $cols, 0, 0, $cols - 1, $dp);
}

function dfs($grid, $rows, $cols, $row, $col1, $col2, &$dp) {
    if ($row == $rows) return 0;
    if ($dp[$row][$col1][$col2] != -1) return $dp[$row][$col1][$col2];
    
    $maxCherries = 0;
    
    for ($d1 = -1; $d1 <= 1; $d1++) {
        for ($d2 = -1; $d2 <= 1; $d2++) {
            $newCol1 = $col1 + $d1;
            $newCol2 = $col2 + $d2;
            
            if ($newCol1 >= 0 && $newCol1 < $cols && $newCol2 >= 0 && $newCol2 < $cols) {
                $maxCherries = max($maxCherries, $this->dfs($grid, $rows, $cols, $row + 1, $newCol1, $newCol2, $dp));
            }
        }
    }
    
    $cherries = ($col1 == $col2) ? $grid[$row][$col1] : $grid[$row][$col1] + $grid[$row][$col2];
    $maxCherries += $cherries;
    
    return $dp[$row][$col1][$col2] = $maxCherries;
}
}
