class Solution {

/**
 * @param String[] $grid
 * @return Integer
 */
function shortestPathAllKeys($grid) {
    $rows = count($grid);
    $cols = strlen($grid[0]);
    $allKeys = 0;
    $startRow = $startCol = -1;

    for ($i = 0; $i < $rows; $i++) {
        for ($j = 0; $j < $cols; $j++) {
            if ($grid[$i][$j] == '@') {
                $startRow = $i;
                $startCol = $j;
            }
            if (ctype_lower($grid[$i][$j])) {
                $allKeys |= 1 << (ord($grid[$i][$j]) - ord('a'));
            }
        }
    }

    $queue = new SplQueue();
    $visited = [];
    $queue->enqueue([$startRow, $startCol, 0, 0]);
    $visited[$startRow][$startCol][0] = true;

    $dirs = [[-1, 0], [1, 0], [0, -1], [0, 1]];
    while (!$queue->isEmpty()) {
        [$row, $col, $keys, $steps] = $queue->dequeue();
        if ($keys == $allKeys) {
            return $steps;
        }
        for ($d = 0; $d < 4; $d++) {
            $newRow = $row + $dirs[$d][0];
            $newCol = $col + $dirs[$d][1];
            if ($newRow >= 0 && $newRow < $rows && $newCol >= 0 && $newCol < $cols && $grid[$newRow][$newCol] != '#') {
                if (ctype_upper($grid[$newRow][$newCol]) && !($keys & (1 << (ord($grid[$newRow][$newCol]) - ord('A'))))) {
                    continue;
                }
                $newKeys = $keys;
                if (ctype_lower($grid[$newRow][$newCol])) {
                    $newKeys |= 1 << (ord($grid[$newRow][$newCol]) - ord('a'));
                }
                if (!isset($visited[$newRow][$newCol][$newKeys])) {
                    $visited[$newRow][$newCol][$newKeys] = true;
                    $queue->enqueue([$newRow, $newCol, $newKeys, $steps + 1]);
                }
            }
        }
    }
    return -1;
}
}
