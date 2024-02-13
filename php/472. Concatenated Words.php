class Solution {
    /**
     * @param String[] $words
     * @return String[]
     */
    function findAllConcatenatedWordsInADict($words) {
        $set = array_flip($words);
        $result = [];

        foreach ($words as $word) {
            unset($set[$word]);
            if ($this->isConcated($word, $set)) {
                $result[] = $word;
            }
            $set[$word] = 1;
        }

        return $result;
    }
    
    function isConcated($word, &$set) {
        $dp = array_fill(0, strlen($word) + 1, false);
        $dp[0] = true;

        for ($i = 1; $i <= strlen($word); $i++) {
            for ($j = 0; $j < $i; $j++) {
                if ($dp[$j] && isset($set[substr($word, $j, $i - $j)])) {
                    $dp[$i] = true;
                    break;
                }
            }
        }

        return $dp[strlen($word)];
    }
}
