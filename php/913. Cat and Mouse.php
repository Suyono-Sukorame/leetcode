class Solution {
    /**
     * @param Integer[][] $graph
     * @return Integer
     */
    function catMouseGame($graph) {
        $n = count($graph);
        $states = array_fill(0, $n, array_fill(0, $n, array_fill(0, 2, 0)));
        $out_degree = array_fill(0, $n, array_fill(0, $n, array_fill(0, 2, 0)));
        
        for ($cat = 0; $cat < $n; ++$cat) {
            for ($mouse = 0; $mouse < $n; ++$mouse) {
                $hole = count(array_keys($graph[$cat], 0));
                $out_degree[$cat][$mouse][0] = count($graph[$mouse]);
                $out_degree[$cat][$mouse][1] = count($graph[$cat]) - $hole;
            }
        }
        
        $q = new SplQueue();
        
        for ($cat = 1; $cat < $n; ++$cat) {
            for ($move = 0; $move < 2; ++$move) {
                $states[$cat][0][$move] = 1; // Mouse wins
                $states[$cat][$cat][$move] = 2; // Cat wins
                $q->enqueue([$cat, 0, $move, $states[$cat][0][$move]]);
                $q->enqueue([$cat, $cat, $move, $states[$cat][$cat][$move]]);
            }
        }
        
        while (!$q->isEmpty()) {
            [$cat, $mouse, $move, $state] = $q->dequeue();
            if ($cat == 2 && $mouse == 1 && $move == 0) {
                return $state;
            }
            $prevMove = $move ^ 1;
            foreach ($graph[$prevMove ? $cat : $mouse] as $prev) {
                $prevCat = $prevMove ? $prev : $cat;
                if ($prevCat == 0) continue;
                $prevMouse = $prevMove ? $mouse : $prev;
                if ($states[$prevCat][$prevMouse][$prevMove] != 0) continue;
                if (($prevMove == 0 && $state == 1) || ($prevMove == 1 && $state == 2) || (--$out_degree[$prevCat][$prevMouse][$prevMove] == 0)) {
                    $states[$prevCat][$prevMouse][$prevMove] = $state;
                    $q->enqueue([$prevCat, $prevMouse, $prevMove, $state]);
                }
            }
        }
        
        return $states[2][1][0];
    }
}
