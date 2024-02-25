class KthLargest {
    /**
     * @var int
     */
    private $k;
    
    /**
     * @var SplMinHeap
     */
    private $minHeap;
    
    function __construct($k, $nums) {
        $this->k = $k;
        $this->minHeap = new SplMinHeap();
        
        foreach ($nums as $num) {
            $this->minHeap->insert($num);
            if ($this->minHeap->count() > $k) {
                $this->minHeap->extract();
            }
        }
    }
  
    /**
     * @param Integer $val
     * @return Integer
     */
    function add($val) {
        $this->minHeap->insert($val);
        if ($this->minHeap->count() > $this->k) {
            $this->minHeap->extract();
        }
        return $this->minHeap->top();
    }
}
