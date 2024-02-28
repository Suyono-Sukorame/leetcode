class Solution {
    /**
     * @param String $s
     * @return Integer[][]
     */
    function largeGroupPositions($s) {
        $result = array();
        $n = strlen($s);
        $start = 0;
        
        for ($i = 1; $i <= $n; $i++) {
            if ($i == $n || $s[$i] !== $s[$i - 1]) {
                if ($i - $start >= 3) {
                    $result[] = array($start, $i - 1);
                }
                $start = $i;
            }
        }
        
        return $result;
    }
}
