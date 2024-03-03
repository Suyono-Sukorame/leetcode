class RLEIterator {
    private $encoding;
    private $index;
    
    function __construct($encoding) {
        $this->encoding = $encoding;
        $this->index = 0;
    }
  
    function next($n) {
        while ($n > 0 && $this->index < count($this->encoding)) {
            if ($this->encoding[$this->index] >= $n) {
                $this->encoding[$this->index] -= $n;
                return $this->encoding[$this->index + 1];
            } else {
                $n -= $this->encoding[$this->index];
                $this->index += 2;
            }
        }
        return -1;
    }
}
