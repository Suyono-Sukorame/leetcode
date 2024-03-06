class Solution {

/**
 * @param Integer[][] $stones
 * @return Integer
 */
function removeStones($stones) {
    $rows = [];
    $cols = [];
    
    foreach ($stones as $stone) {
        $rows[$stone[0]][] = $stone[1];
        $cols[$stone[1]][] = $stone[0];
    }
    
    $count = 0;
    $visited = [];
    
    foreach ($stones as $stone) {
        if (!isset($visited[$stone[0]][$stone[1]])) {
            $count++;
            $this->dfs($stone[0], $stone[1], $rows, $cols, $visited);
        }
    }
    
    return count($stones) - $count;
}

function dfs($x, $y, &$rows, &$cols, &$visited) {
    $visited[$x][$y] = true;
    
    foreach ($rows[$x] as $r) {
        if (!isset($visited[$x][$r])) {
            $this->dfs($x, $r, $rows, $cols, $visited);
        }
    }
    
    foreach ($cols[$y] as $c) {
        if (!isset($visited[$c][$y])) {
            $this->dfs($c, $y, $rows, $cols, $visited);
        }
    }
}
}
