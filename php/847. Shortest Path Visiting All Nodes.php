class Solution {
    /**
     * @param Integer[][] $graph
     * @return Integer
     */
    function shortestPathLength($graph) {
        $n = count($graph);
        $target = (1 << $n) - 1;
        $queue = new SplQueue();
        $visited = [];
        
        for ($i = 0; $i < $n; $i++) {
            $startState = (1 << $i);
            $queue->enqueue([$startState, $i, 0]);
            $visited[$startState][$i] = true;
        }
        
        while (!$queue->isEmpty()) {
            list($state, $node, $length) = $queue->dequeue();
            if ($state == $target) {
                return $length;
            }
            foreach ($graph[$node] as $neighbor) {
                $newState = $state | (1 << $neighbor);
                if (!isset($visited[$newState][$neighbor])) {
                    $queue->enqueue([$newState, $neighbor, $length + 1]);
                    $visited[$newState][$neighbor] = true;
                }
            }
        }
        
        return -1;
    }
}
