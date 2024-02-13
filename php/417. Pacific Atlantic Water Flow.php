class Solution {

/**
 * @param Integer[][] $heights
 * @return Integer[][]
 */
function pacificAtlantic($heights) {
    if (empty($heights)) return [];
    
    $m = count($heights);
    $n = count($heights[0]);
    $pacific = [];
    $atlantic = [];
    
    // Initialize visited arrays for both oceans
    $visitedPacific = array_fill(0, $m, array_fill(0, $n, false));
    $visitedAtlantic = array_fill(0, $m, array_fill(0, $n, false));
    
    // DFS from each border cell for both oceans
    for ($i = 0; $i < $m; $i++) {
        $this->dfs($heights, $visitedPacific, $i, 0, $m, $n);
        $this->dfs($heights, $visitedAtlantic, $i, $n - 1, $m, $n);
    }
    for ($j = 0; $j < $n; $j++) {
        $this->dfs($heights, $visitedPacific, 0, $j, $m, $n);
        $this->dfs($heights, $visitedAtlantic, $m - 1, $j, $m, $n);
    }
    
    // Find cells that can flow to both oceans
    for ($i = 0; $i < $m; $i++) {
        for ($j = 0; $j < $n; $j++) {
            if ($visitedPacific[$i][$j] && $visitedAtlantic[$i][$j]) {
                $result[] = [$i, $j];
            }
        }
    }
    
    return $result;
}

function dfs(&$heights, &$visited, $x, $y, $m, $n) {
    $visited[$x][$y] = true;
    
    $directions = [[-1, 0], [1, 0], [0, -1], [0, 1]];
    
    foreach ($directions as $dir) {
        $nx = $x + $dir[0];
        $ny = $y + $dir[1];
        
        if ($nx >= 0 && $nx < $m && $ny >= 0 && $ny < $n && !$visited[$nx][$ny] && $heights[$nx][$ny] >= $heights[$x][$y]) {
            $this->dfs($heights, $visited, $nx, $ny, $m, $n);
        }
    }
}
}

$solution = new Solution();
$heights = [
[1,2,2,3,5],
[3,2,3,4,4],
[2,4,5,3,1],
[6,7,1,4,5],
[5,1,1,2,4]
];
print_r($solution->pacificAtlantic($heights));
