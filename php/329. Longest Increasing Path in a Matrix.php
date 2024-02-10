class Solution {

/**
 * @param Integer[][] $matrix
 * @return Integer
 */
function longestIncreasingPath($matrix) {
    if (empty($matrix)) return 0;
    
    $m = count($matrix);
    $n = count($matrix[0]);
    $memo = [];
    $dirs = [[0, 1], [1, 0], [0, -1], [-1, 0]];
    $maxPath = 0;
    
    for ($i = 0; $i < $m; $i++) {
        for ($j = 0; $j < $n; $j++) {
            $maxPath = max($maxPath, $this->dfs($matrix, $i, $j, $memo, $dirs));
        }
    }
    
    return $maxPath;
}

function dfs(&$matrix, $i, $j, &$memo, $dirs) {
    if (isset($memo[$i][$j])) return $memo[$i][$j];
    
    $m = count($matrix);
    $n = count($matrix[0]);
    $memo[$i][$j] = 1;
    
    foreach ($dirs as $dir) {
        $x = $i + $dir[0];
        $y = $j + $dir[1];
        
        if ($x >= 0 && $x < $m && $y >= 0 && $y < $n && $matrix[$x][$y] > $matrix[$i][$j]) {
            $memo[$i][$j] = max($memo[$i][$j], 1 + $this->dfs($matrix, $x, $y, $memo, $dirs));
        }
    }
    
    return $memo[$i][$j];
}
}
