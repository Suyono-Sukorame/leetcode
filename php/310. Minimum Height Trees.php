class Solution {

/**
 * @param Integer $n
 * @param Integer[][] $edges
 * @return Integer[]
 */
function findMinHeightTrees($n, $edges) {
    if ($n === 1) return [0];

    $adjacencyList = array_fill(0, $n, []);
    $degree = array_fill(0, $n, 0);

    foreach ($edges as $edge) {
        $u = $edge[0];
        $v = $edge[1];
        $adjacencyList[$u][] = $v;
        $adjacencyList[$v][] = $u;
        $degree[$u]++;
        $degree[$v]++;
    }

    $queue = new SplQueue();

    for ($i = 0; $i < $n; $i++) {
        if ($degree[$i] === 1) {
            $queue->enqueue($i);
        }
    }

    $remainingNodes = $n;
    while ($remainingNodes > 2) {
        $numNodesAtCurrentLevel = $queue->count();
        $remainingNodes -= $numNodesAtCurrentLevel;

        for ($i = 0; $i < $numNodesAtCurrentLevel; $i++) {
            $node = $queue->dequeue();

            foreach ($adjacencyList[$node] as $neighbor) {
                $degree[$neighbor]--;
                if ($degree[$neighbor] === 1) {
                    $queue->enqueue($neighbor);
                }
            }
        }
    }

    $result = [];
    while (!$queue->isEmpty()) {
        $result[] = $queue->dequeue();
    }

    return $result;
}
}
