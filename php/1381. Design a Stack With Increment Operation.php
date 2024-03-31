class CustomStack {
    private $stack;
    private $maxSize;

    /**
     * @param Integer $maxSize
     */
    function __construct($maxSize) {
        $this->stack = [];
        $this->maxSize = $maxSize;
    }
  
    /**
     * @param Integer $x
     * @return NULL
     */
    function push($x) {
        if (count($this->stack) < $this->maxSize) {
            array_push($this->stack, $x);
        }
    }
  
    /**
     * @return Integer
     */
    function pop() {
        if (empty($this->stack)) {
            return -1;
        }
        return array_pop($this->stack);
    }
  
    /**
     * @param Integer $k
     * @param Integer $val
     * @return NULL
     */
    function increment($k, $val) {
        $length = min($k, count($this->stack));
        for ($i = 0; $i < $length; $i++) {
            $this->stack[$i] += $val;
        }
    }
}
