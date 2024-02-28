class Solution {
    public $graph = [];
    public $count = [];
    public $res = [];
    
    /**
     * @param Integer $n
     * @param Integer[][] $edges
     * @return Integer[]
     */
    function sumOfDistancesInTree($n, $edges) {
        for ($i = 0; $i < $n; $i++) {
            $this->graph[$i] = [];
        }
        
        foreach ($edges as $edge) {
            $this->graph[$edge[0]][] = $edge[1];
            $this->graph[$edge[1]][] = $edge[0];
        }
        
        $this->count = array_fill(0, $n, 1);
        $this->res = array_fill(0, $n, 0);
        
        $this->dfs(0, -1);
        
        $this->dfs2(0, -1, $n);
        
        return $this->res;
    }
    
    function dfs($node, $parent) {
        foreach ($this->graph[$node] as $child) {
            if ($child != $parent) {
                $this->dfs($child, $node);
                $this->count[$node] += $this->count[$child];
                $this->res[$node] += $this->res[$child] + $this->count[$child];
            }
        }
    }
    
    function dfs2($node, $parent, $n) {
        foreach ($this->graph[$node] as $child) {
            if ($child != $parent) {
                $this->res[$child] = $this->res[$node] - $this->count[$child] + ($n - $this->count[$child]);
                $this->dfs2($child, $node, $n);
            }
        }
    }
}