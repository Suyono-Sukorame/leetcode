class Solution {

/**
 * @param Integer $n
 * @param Integer[][] $redEdges
 * @param Integer[][] $blueEdges
 * @return Integer[]
 */
function shortestAlternatingPaths($n, $redEdges, $blueEdges) {
    $redMap = [];
    foreach ($redEdges as $redEdge) {
        $redMap[$redEdge[0]][$redEdge[1]] = true;
    }
    $blueMap = [];
    foreach ($blueEdges as $blueEdge) {
        $blueMap[$blueEdge[0]][$blueEdge[1]] = true;
    }

    $answer = array_fill(0, $n, -1);

    $q = [];
    $q[] = [0, 0, 'none']; // node, length, prev_color
    $visited = array_fill(0, $n, ['red' => false, 'blue' => false]);
    $visited[0]['red'] = $visited[0]['blue'] = true;
    while (count($q)) {
        $el = array_shift($q);
        if ($answer[$el[0]] == -1) {
            $answer[$el[0]] = $el[1];
        }

        if ($el[2] != 'red') {
            foreach ($redMap[$el[0]] as $next => $t) {
                if (!$visited[$next]['red']) {
                    $visited[$next]['red'] = true;
                    $q[] = [$next, $el[1] + 1, 'red'];
                }
            }
        }
        if ($el[2] != 'blue') {
            foreach ($blueMap[$el[0]] as $next => $t) {
                if (!$visited[$next]['blue']) {
                    $visited[$next]['blue'] = true;
                    $q[] = [$next, $el[1] + 1, 'blue'];
                }
            }
        }
    }

    return $answer;
}
}
