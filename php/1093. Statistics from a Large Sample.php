class Solution {
    private $n;
    private $totalCount;

    /**
     * @param Integer[] $count
     * @return Float[]
     */
    function sampleStats($count) {
        $this->n = count($count);
        $this->totalCount = 0;
        $ans = array($this->min($count), $this->max($count), $this->mean($count), $this->median($count), $this->mode($count));
        return $ans;
    }
    
    function min($count) {
        for ($i = 0; $i < $this->n; $i++) {
            if ($count[$i] != 0) {
                return $i;
            }
        }
        return -1;
    }
    
    function max($count) {
        for ($i = $this->n - 1; $i >= 0; $i--) {
            if ($count[$i] != 0) {
                return $i;
            }
        }
        return -1;
    }
    
    function mean($count) {
        $sum = 0;
        for ($i = 0; $i < $this->n; $i++) {
            if ($count[$i] != 0) {
                $sum += $i * $count[$i];
                $this->totalCount += $count[$i];
            }
        }
        return $sum / (float) $this->totalCount;
    }
    
    function median($count) {
        $curCount = 0;
        $first = -1;
        $second = -1;
        for ($i = 0; $i < $this->n; $i++) {
            if ($count[$i] != 0) {
                $curCount += $count[$i];
                if ($this->totalCount % 2 == 0) {
                    if ($first == -1 && $curCount >= $this->totalCount / 2) {
                        $first = $i;
                    }
                    if ($curCount >= 1 + $this->totalCount / 2) {
                        $second = $i;
                        return ($first + (float) $second) / 2;
                    }
                } else {
                    if ($curCount >= (1 + $this->totalCount) / 2) {
                        return (float) $i;
                    }
                } 
            } 
        }
        return -1;
    }
    
    function mode($count) {
        $max = array(0, 0);
        for ($i = 0; $i < $this->n; $i++) {
            if ($count[$i] > $max[1]) {
                $max[0] = $i;
                $max[1] = $count[$i];
            }
        }
        return $max[0];
    }
}
