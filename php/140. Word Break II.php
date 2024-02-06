class Solution {
    /**
     * @param String $s
     * @param String[] $wordDict
     * @return String[]
     */
    function wordBreak($s, $wordDict) {
        $memo = [];
        return $this->wordBreakHelper($s, $wordDict, $memo);
    }
    
    function wordBreakHelper($s, $wordDict, &$memo) {
        if (isset($memo[$s])) {
            return $memo[$s];
        }
        
        $result = [];
        
        if (empty($s)) {
            return [''];
        }
        
        foreach ($wordDict as $word) {
            $wordLength = strlen($word);
            if (substr($s, 0, $wordLength) === $word) {
                $remaining = substr($s, $wordLength);
                $remainingBreaks = $this->wordBreakHelper($remaining, $wordDict, $memo);
                foreach ($remainingBreaks as $remainingBreak) {
                    $space = empty($remainingBreak) ? '' : ' ';
                    $result[] = $word . $space . $remainingBreak;
                }
            }
        }
        
        $memo[$s] = $result;
        return $result;
    }
}
