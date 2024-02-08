class NumMatrix {
    private $prefixSum;

    /**
     * @param Integer[][] $matrix
     */
    function __construct($matrix) {
        $m = count($matrix);
        $n = count($matrix[0]);
        
        $this->prefixSum = array_fill(0, $m + 1, array_fill(0, $n + 1, 0));
        
        for ($i = 1; $i <= $m; $i++) {
            for ($j = 1; $j <= $n; $j++) {
                $this->prefixSum[$i][$j] = $this->prefixSum[$i - 1][$j] + $this->prefixSum[$i][$j - 1] - $this->prefixSum[$i - 1][$j - 1] + $matrix[$i - 1][$j - 1];
            }
        }
    }
  
    /**
     * @param Integer $row1
     * @param Integer $col1
     * @param Integer $row2
     * @param Integer $col2
     * @return Integer
     */
    function sumRegion($row1, $col1, $row2, $col2) {
        return $this->prefixSum[$row2 + 1][$col2 + 1] - $this->prefixSum[$row1][$col2 + 1] - $this->prefixSum[$row2 + 1][$col1] + $this->prefixSum[$row1][$col1];
    }
}


