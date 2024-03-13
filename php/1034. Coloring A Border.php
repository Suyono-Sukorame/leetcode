class Solution {

function colorBorder($grid, $row, $col, $color) {
    $n = count($grid);
    $m = count($grid[0]);

    if ($grid[$row][$col] == $color) {
        return $grid;
    }

    $visited = array_fill(0, $n, array_fill(0, $m, false));
    $this->dfs($grid, $row, $col, $grid[$row][$col], $visited, $color, $n, $m);

    return $grid;
}

function dfs(&$grid, $i, $j, $oldColor, &$visited, $targetColor, $n, $m) {
    if ($i >= $n || $i < 0 || $j < 0 || $j >= $m || $grid[$i][$j] != $oldColor || $visited[$i][$j]) {
        return;
    }

    $visited[$i][$j] = true;
    $border = false;

    if ($i == 0 || $j == 0 || $j == $m - 1 || $i == $n - 1 || 
        $grid[$i + 1][$j] != $oldColor || $grid[$i - 1][$j] != $oldColor || 
        $grid[$i][$j - 1] != $oldColor || $grid[$i][$j + 1] != $oldColor) {
        $border = true;
    }

    $this->dfs($grid, $i + 1, $j, $oldColor, $visited, $targetColor, $n, $m);
    $this->dfs($grid, $i - 1, $j, $oldColor, $visited, $targetColor, $n, $m);
    $this->dfs($grid, $i, $j + 1, $oldColor, $visited, $targetColor, $n, $m);
    $this->dfs($grid, $i, $j - 1, $oldColor, $visited, $targetColor, $n, $m);

    if ($border) {
        $grid[$i][$j] = $targetColor;
    }
}
}
