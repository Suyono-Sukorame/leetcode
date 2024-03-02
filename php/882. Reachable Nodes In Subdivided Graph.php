class Solution {

/**
 * @param Integer[][] $edges
 * @param Integer $maxMoves
 * @param Integer $n
 * @return Integer
 */
function reachableNodes($edges, $maxMoves, $n) {
    $graph = array_fill(0, $n, array_fill(0, $n, -1));
    
    foreach ($edges as $edge) {
        $graph[$edge[0]][$edge[1]] = $edge[2];
        $graph[$edge[1]][$edge[0]] = $edge[2];
    }
    
    $heap = new SplPriorityQueue();
    $ans = 0;
    $vis = array_fill(0, $n, false);
    $heap->insert([0, $maxMoves], $maxMoves);

    while (!$heap->isEmpty()) {
        $info = $heap->extract();
        $nearestNodeId = $info[0];
        $maxMovesRemaining = $info[1];

        if ($vis[$nearestNodeId]) {
            continue;
        }
        
        $vis[$nearestNodeId] = true;
        $ans++;

        for ($i = 0; $i < $n; $i++) {
            if ($graph[$nearestNodeId][$i] != -1) {
                if (!$vis[$i] && $maxMovesRemaining >= $graph[$nearestNodeId][$i] + 1) {
                    $heap->insert([$i, $maxMovesRemaining - $graph[$nearestNodeId][$i] - 1], $maxMovesRemaining - $graph[$nearestNodeId][$i] - 1);
                }
                $movesTaken = min($maxMovesRemaining, $graph[$nearestNodeId][$i]);
                $graph[$nearestNodeId][$i] -= $movesTaken;
                $graph[$i][$nearestNodeId] -= $movesTaken;
                $ans += $movesTaken;
            }
        }
    }
    
    return $ans;
}
}
