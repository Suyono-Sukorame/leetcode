class Solution {

/**
 * @param Integer[][] $grid
 * @return Integer
 */
function shortestPathBinaryMatrix($grid) {
    $n = count($grid);
    if ($grid[0][0] == 1 || $grid[$n - 1][$n - 1] == 1) {
        return -1;
    }

    $directions = [[-1, -1], [-1, 0], [-1, 1], [0, -1], [0, 1], [1, -1], [1, 0], [1, 1]];
    $queue = [[0, 0, 1]];
    $visited = array_fill(0, $n, array_fill(0, $n, false));
    $visited[0][0] = true;

    while (!empty($queue)) {
        [$x, $y, $length] = array_shift($queue);
        if ($x == $n - 1 && $y == $n - 1) {
            return $length;
        }

        foreach ($directions as $dir) {
            $newX = $x + $dir[0];
            $newY = $y + $dir[1];
            if ($newX >= 0 && $newX < $n && $newY >= 0 && $newY < $n && !$visited[$newX][$newY] && $grid[$newX][$newY] == 0) {
                $queue[] = [$newX, $newY, $length + 1];
                $visited[$newX][$newY] = true;
            }
        }
    }

    return -1;
}
}
