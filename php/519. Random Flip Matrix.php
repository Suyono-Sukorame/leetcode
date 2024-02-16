class Solution {
    private $rows;
    private $cols;
    private $total;
    private $flipped;
    
    /**
     * @param Integer $m
     * @param Integer $n
     */
    function __construct($m, $n) {
        $this->rows = $m;
        $this->cols = $n;
        $this->total = $m * $n;
        $this->flipped = [];
    }
  
    /**
     * @return Integer[]
     */
    function flip() {
        $randIndex = rand(0, --$this->total);
        $index = $this->flipped[$randIndex] ?? $randIndex;
        $this->flipped[$randIndex] = $this->flipped[$this->total] ?? $this->total;
        unset($this->flipped[$this->total]);
        
        return [intval($index / $this->cols), $index % $this->cols];
    }
  
    /**
     * @return NULL
     */
    function reset() {
        $this->total = $this->rows * $this->cols;
        $this->flipped = [];
    }
}
