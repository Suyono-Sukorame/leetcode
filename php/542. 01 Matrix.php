class Solution {

/**
 * @param Integer[][] $mat
 * @return Integer[][]
 */
function updateMatrix($mat) {
    $m = count($mat);
    $n = count($mat[0]);
    
    $queue = new SplQueue();
    $visited = [];
    
    for ($i = 0; $i < $m; $i++) {
        for ($j = 0; $j < $n; $j++) {
            if ($mat[$i][$j] == 0) {
                $visited[$i][$j] = true;
                $queue->enqueue([$i, $j]);
            } else {
                $visited[$i][$j] = false;
            }
        }
    }
    
    $directions = [[-1, 0], [1, 0], [0, -1], [0, 1]];
    
    while (!$queue->isEmpty()) {
        $current = $queue->dequeue();
        $x = $current[0];
        $y = $current[1];
        foreach ($directions as $dir) {
            $nx = $x + $dir[0];
            $ny = $y + $dir[1];
            if ($nx >= 0 && $nx < $m && $ny >= 0 && $ny < $n && !$visited[$nx][$ny]) {
                $mat[$nx][$ny] = $mat[$x][$y] + 1;
                $visited[$nx][$ny] = true;
                $queue->enqueue([$nx, $ny]);
            }
        }
    }
    
    return $mat;
}
}
