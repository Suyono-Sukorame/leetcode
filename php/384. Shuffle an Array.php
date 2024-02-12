class Solution {
    private $originalNums;
    
    /**
     * @param Integer[] $nums
     */
    function __construct($nums) {
        $this->originalNums = $nums;
    }
  
    /**
     * @return Integer[]
     */
    function reset() {
        return $this->originalNums;
    }
  
    /**
     * @return Integer[]
     */
    function shuffle() {
        $shuffledNums = $this->originalNums;
        $n = count($shuffledNums);
        
        for ($i = $n - 1; $i > 0; $i--) {
            $j = rand(0, $i);
            $temp = $shuffledNums[$i];
            $shuffledNums[$i] = $shuffledNums[$j];
            $shuffledNums[$j] = $temp;
        }
        
        return $shuffledNums;
    }
}

/**
 * Your Solution object will be instantiated and called as such:
 * $obj = Solution($nums);
 * $ret_1 = $obj->reset();
 * $ret_2 = $obj->shuffle();
 */
