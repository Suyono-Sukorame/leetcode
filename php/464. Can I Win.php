class Solution {
    function canIWin($maxChoosableInteger, $desiredTotal) {
        if ($desiredTotal <= 0) return true;
        if ($maxChoosableInteger * ($maxChoosableInteger + 1) / 2 < $desiredTotal) return false;
        
        $this->memo = [];
        
        return $this->canWin(0, $desiredTotal, $maxChoosableInteger);
    }
    
    function canWin($state, $total, $max) {
        if (isset($this->memo[$state])) return $this->memo[$state];
        
        for ($i = 1; $i <= $max; $i++) {
            $mask = 1 << ($i - 1);
            
            if (($state & $mask) === 0) {
                if ($i >= $total || !$this->canWin($state | $mask, $total - $i, $max)) {
                    $this->memo[$state] = true;
                    return true;
                }
            }
        }
        
        $this->memo[$state] = false;
        return false;
    }
}
