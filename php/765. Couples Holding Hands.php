class Solution {

/**
 * @param Integer[] $row
 * @return Integer
 */
function minSwapsCouples($row) {
    $n = count($row) / 2;
    $graph = [];
    
    for ($i = 0; $i < $n; $i++) {
        $l = floor($row[2 * $i] / 2);
        $r = floor($row[2 * $i + 1] / 2);
        $graph[$l][] = $r;
        $graph[$r][] = $l;
    }
    
    $visited = array_fill(0, $n, false);
    $ans = 0;
    
    for ($i = 0; $i < $n; $i++) {
        if (!$visited[$i]) {
            $this->dfs($graph, $i, $visited);
            $ans++;
        }
    }
    
    return $n - $ans;
}

function dfs(&$graph, $node, &$visited) {
    $visited[$node] = true;
    
    foreach ($graph[$node] as $neighbor) {
        if (!$visited[$neighbor]) {
            $this->dfs($graph, $neighbor, $visited);
        }
    }
}
}
