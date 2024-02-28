class Solution {
    /**
     * @param String $s
     * @return Integer
     */
    function uniqueLetterString($s) {
        $mod = 10**9 + 7;
        $lastIndex = array_fill(-1, 26, -1);
        $prevIndex = array_fill(-1, 26, -1);
        $result = 0;
        $n = strlen($s);
        
        for ($i = 0; $i < $n; $i++) {
            $index = ord($s[$i]) - ord('A');
            $result = ($result + ($i - $lastIndex[$index]) * ($lastIndex[$index] - $prevIndex[$index])) % $mod;
            $prevIndex[$index] = $lastIndex[$index];
            $lastIndex[$index] = $i;
        }
        
        for ($i = 0; $i < 26; $i++) {
            $result = ($result + ($n - $lastIndex[$i]) * ($lastIndex[$i] - $prevIndex[$i])) % $mod;
        }
        
        return $result;
    }
}
