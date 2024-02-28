class Solution {
    public function maxProfitAssignment($difficulty, $profit, $worker) {
        $len = count($difficulty);
        $pairs = array();
        for ($i = 0; $i < $len; $i++) {
            $pairs[] = array($difficulty[$i], $profit[$i]);
        }
        usort($pairs, function($a, $b) {
            return $a[0] - $b[0];
        });
        
        $maxProfit = 0;
        $maxSoFar = array();
        $maxSoFar[0] = $pairs[0][1];
        
        for ($i = 1; $i < $len; $i++) {
            if ($pairs[$i][1] > $maxSoFar[$i - 1]) {
                $maxSoFar[$i] = $pairs[$i][1];
            } else {
                $maxSoFar[$i] = $maxSoFar[$i - 1];
            }
        }
        
        foreach ($worker as $w) {
            $index = $this->getIndex($w, $pairs, $len);
            if ($index != -1) {
                $maxProfit += $maxSoFar[$index];
            }
        }
        
        return $maxProfit;
    }
    
    private function getIndex($cap, $pair, $len) {
        $low = 0;
        $high = $len - 1;
        while ($low <= $high) {
            $mid = (int)(($high + $low) / 2);
            if ($pair[$mid][0] == $cap) {
                // Check for same items
                while ($mid < $high && $pair[$mid + 1][0] == $cap) {
                    $mid++;
                }
                return $mid;
            } elseif ($pair[$mid][0] < $cap) {
                $low = $mid + 1;
            } elseif ($pair[$mid][0] > $cap) {
                $high = $mid - 1;
            }
        }
        return $high;
    }
}
