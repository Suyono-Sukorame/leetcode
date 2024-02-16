class Solution {
    /**
     * @param String[] $strs
     * @return Integer
     */
    function findLUSlength($strs) {
        $n = count($strs);
        $maxLength = -1;
        
        for ($i = 0; $i < $n; $i++) {
            $isSubsequence = false;
            $currentLength = strlen($strs[$i]);
            
            for ($j = 0; $j < $n; $j++) {
                if ($i != $j && $this->isSubsequence($strs[$i], $strs[$j])) {
                    $isSubsequence = true;
                    break;
                }
            }
            
            if (!$isSubsequence) {
                $maxLength = max($maxLength, $currentLength);
            }
        }
        
        return $maxLength;
    }
    
    private function isSubsequence($a, $b) {
        $i = 0;
        $j = 0;
        
        while ($i < strlen($a) && $j < strlen($b)) {
            if ($a[$i] == $b[$j]) {
                $i++;
            }
            $j++;
        }
        
        return $i == strlen($a);
    }
}
