class Solution {

/**
 * @param Integer $n
 * @param Integer[][] $dislikes
 * @return Boolean
 */
function possibleBipartition($n, $dislikes) {
    $graph = [];
    foreach ($dislikes as $dislike) {
        $a = $dislike[0];
        $b = $dislike[1];
        $graph[$a][] = $b;
        $graph[$b][] = $a;
    }
    
    $colors = array_fill(1, $n, 0);
    
    for ($i = 1; $i <= $n; $i++) {
        if ($colors[$i] == 0 && !$this->dfs($i, 1, $graph, $colors)) {
            return false;
        }
    }
    
    return true;
}

function dfs($node, $color, &$graph, &$colors) {
    $colors[$node] = $color;
    if (!isset($graph[$node])) return true;
    
    foreach ($graph[$node] as $neighbor) {
        if ($colors[$neighbor] == $color) return false;
        if ($colors[$neighbor] == 0 && !$this->dfs($neighbor, -$color, $graph, $colors)) {
            return false;
        }
    }
    
    return true;
}
}
