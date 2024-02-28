class Solution {
    /**
     * @param Integer[][] $richer
     * @param Integer[] $quiet
     * @return Integer[]
     */
    function loudAndRich($richer, $quiet) {
        $n = count($quiet);
        $graph = array_fill(0, $n, []);
        foreach ($richer as $edge) {
            $graph[$edge[1]][] = $edge[0];
        }
        
        $answer = array_fill(0, $n, -1);
        for ($i = 0; $i < $n; $i++) {
            $this->dfs($graph, $quiet, $answer, $i);
        }
        
        return $answer;
    }
    
    function dfs($graph, $quiet, &$answer, $node) {
        if ($answer[$node] != -1) return $answer[$node];
        
        $answer[$node] = $node;
        foreach ($graph[$node] as $neighbor) {
            $candidate = $this->dfs($graph, $quiet, $answer, $neighbor);
            if ($quiet[$candidate] < $quiet[$answer[$node]]) {
                $answer[$node] = $candidate;
            }
        }
        
        return $answer[$node];
    }
}
