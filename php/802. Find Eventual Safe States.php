class Solution {

/**
 * @param Integer[][] $graph
 * @return Integer[]
 */
function eventualSafeNodes($graph) {
    $n = count($graph);
    $color = array_fill(0, $n, 0);
    $result = array();
    
    for ($i = 0; $i < $n; $i++) {
        if ($this->dfs($graph, $color, $i))
            $result[] = $i;
    }
    
    return $result;
}

function dfs($graph, &$color, $node) {
    if ($color[$node] > 0)
        return $color[$node] == 2;
    
    $color[$node] = 1;
    
    foreach ($graph[$node] as $neighbor) {
        if ($color[$neighbor] == 2)
            continue;
        if ($color[$neighbor] == 1 || !$this->dfs($graph, $color, $neighbor))
            return false;
    }
    
    $color[$node] = 2;
    return true;
}
}
