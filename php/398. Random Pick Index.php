class Solution {
    /**
     * @var array
     */
    private $indices;
    
    /**
     * @param Integer[] $nums
     */
    function __construct($nums) {
        $this->indices = [];
        foreach ($nums as $i => $num) {
            if (!isset($this->indices[$num])) {
                $this->indices[$num] = [];
            }
            $this->indices[$num][] = $i;
        }
    }
  
    /**
     * @param Integer $target
     * @return Integer
     */
    function pick($target) {
        $indices = $this->indices[$target];
        $randomIndex = mt_rand(0, count($indices) - 1);
        return $indices[$randomIndex];
    }
}

/**
 * Your Solution object will be instantiated and called as such:
 * $obj = Solution($nums);
 * $ret_1 = $obj->pick($target);
 */
