class Solution {
    
    /**
     * @param Integer[] $machines
     * @return Integer
     */
    function findMinMoves($machines) {
        $n = count($machines);
        $sum = array_sum($machines);
        
        if ($sum % $n != 0) {
            return -1;
        }
        
        $avg = $sum / $n;
        $leftSums = array_fill(0, $n, 0);
        $rightSums = array_fill(0, $n, 0);
        
        for ($i = 1; $i < $n; $i++) {
            $leftSums[$i] = $leftSums[$i - 1] + $machines[$i - 1];
        }
        for ($i = $n - 2; $i >= 0; $i--) {
            $rightSums[$i] = $rightSums[$i + 1] + $machines[$i + 1];
        }
        
        $move = 0;
        
        for ($i = 0; $i < $n; $i++) {
            $expLeft = $i * $avg;
            $expRight = ($n - $i - 1) * $avg;
            $left = 0;
            $right = 0;
            if ($expLeft > $leftSums[$i]) {
                $left = $expLeft - $leftSums[$i];
            }
            if ($expRight > $rightSums[$i]) {
                $right = $expRight - $rightSums[$i];
            }
            $move = max($move, $left + $right);
        }
        
        return $move;
    }
}
