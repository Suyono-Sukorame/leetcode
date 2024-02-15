class Solution {
    
    /**
     * @param String $ring
     * @param String $key
     * @return Integer
     */
    function findRotateSteps($ring, $key) {
        $charToIndices = [];
        $chars = str_split($ring);
        $cycleSteps = strlen($ring);
        
        // Membuat kamus untuk indeks karakter di dalam ring
        for ($index = 0; $index < count($chars); $index++) {
            if (!isset($charToIndices[$chars[$index]])) {
                $charToIndices[$chars[$index]] = [];
            }
            $charToIndices[$chars[$index]][] = $index;
        }
        
        $states = [new State(0, 0)];
        
        for ($i = 0; $i < strlen($key); $i++) {
            $nextLevel = [];
            if (isset($charToIndices[$key[$i]])) {
                foreach ($charToIndices[$key[$i]] as $index) {
                    $steps = PHP_INT_MAX;
                    foreach ($states as $state) {
                        $temp = abs($state->currentPosition - $index);
                        $steps = min($steps, min($temp, $cycleSteps - $temp) + $state->steps);
                    }
                    $nextLevel[] = new State($steps, $index);
                }
            }
            $states = $nextLevel;
        }
        
        $ans = PHP_INT_MAX;
        foreach ($states as $state) {
            $ans = min($ans, $state->steps);
        }
        
        return $ans + strlen($key);
    }
}

class State {
    public $steps;
    public $currentPosition;
    
    function __construct($steps, $currentPosition) {
        $this->steps = $steps;
        $this->currentPosition = $currentPosition;
    }
}
