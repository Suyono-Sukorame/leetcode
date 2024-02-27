class Solution {

/**
 * @param Integer[][] $graph
 * @return Integer[][]
 */
function allPathsSourceTarget($graph) {
    $paths = [];
    $this->dfs($graph, 0, [0], $paths);
    return $paths;
}

function dfs($graph, $node, $path, &$paths) {
    if ($node == count($graph) - 1) {
        $paths[] = $path;
        return;
    }
    
    foreach ($graph[$node] as $neighbor) {
        $this->dfs($graph, $neighbor, array_merge($path, [$neighbor]), $paths);
    }
}
}
