class Solution {
    /**
     * @param Integer[] $piles
     * @return Integer
     */
    function stoneGameII($piles) {
        $n = count($piles);
        $prefixSum = array_fill(0, $n, 0);
        $prefixSum[$n - 1] = $piles[$n - 1];
        
        for ($i = $n - 2; $i >= 0; $i--) {
            $prefixSum[$i] = $prefixSum[$i + 1] + $piles[$i];
        }
        
        $memo = [];
        for ($i = 0; $i < $n; $i++) {
            $memo[$i] = array_fill(0, $n, -1);
        }
        
        return $this->dfs($piles, $prefixSum, $memo, 0, 1);
    }
    
    function dfs($piles, $prefixSum, &$memo, $i, $M) {
        $n = count($piles);
        
        if ($i == $n) {
            return 0;
        }
        
        if (2 * $M >= $n - $i) {
            return $prefixSum[$i];
        }
        
        if ($memo[$i][$M] != -1) {
            return $memo[$i][$M];
        }
        
        $maxStones = 0;
        for ($x = 1; $x <= 2 * $M; $x++) {
            $remainingStones = $prefixSum[$i] - $this->dfs($piles, $prefixSum, $memo, $i + $x, max($M, $x));
            $maxStones = max($maxStones, $remainingStones);
        }
        
        $memo[$i][$M] = $maxStones;
        return $maxStones;
    }
}
