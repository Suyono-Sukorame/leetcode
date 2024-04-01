class Solution {
    /**
     * @param Integer $n
     * @param Integer[] $speed
     * @param Integer[] $efficiency
     * @param Integer $k
     * @return Integer
     */
    function maxPerformance($n, $speed, $efficiency, $k) {
        $engineers = [];
        for ($i = 0; $i < $n; $i++) {
            $engineers[] = ['speed' => $speed[$i], 'efficiency' => $efficiency[$i]];
        }
        
        usort($engineers, function($a, $b) {
            return $b['efficiency'] - $a['efficiency'];
        });
        
        $heap = new SplPriorityQueue();
        $speedSum = 0;
        $maxPerformance = 0;
        
        foreach ($engineers as $engineer) {
            $speedSum += $engineer['speed'];
            $heap->insert($engineer['speed'], -$engineer['speed']);
            
            if ($heap->count() > $k) {
                $speedSum -= $heap->extract();
            }
            
            $maxPerformance = max($maxPerformance, $speedSum * $engineer['efficiency']);
        }
        
        return $maxPerformance % (10**9 + 7);
    }
}
