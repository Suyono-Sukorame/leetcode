class NumArray {
    private $prefixSum;

    /**
     * @param Integer[] $nums
     */
    function __construct($nums) {
        $n = count($nums);
        $this->prefixSum = array_fill(0, $n, 0);
        $this->prefixSum[0] = $nums[0];
        
        // Hitung prefix sum
        for ($i = 1; $i < $n; $i++) {
            $this->prefixSum[$i] = $this->prefixSum[$i - 1] + $nums[$i];
        }
    }
  
    /**
     * @param Integer $left
     * @param Integer $right
     * @return Integer
     */
    function sumRange($left, $right) {
        if ($left == 0) {
            return $this->prefixSum[$right];
        } else {
            return $this->prefixSum[$right] - $this->prefixSum[$left - 1];
        }
    }
}
