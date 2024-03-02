class FreqStack {
    private $freqMap;
    private $groupMap;
    private $maxFreq;
    
    function __construct() {
        $this->freqMap = array();
        $this->groupMap = array();
        $this->maxFreq = 0;
    }
  
    function push($val) {
        if (!isset($this->freqMap[$val])) {
            $this->freqMap[$val] = 0;
        }
        $this->freqMap[$val]++;
        
        $freq = $this->freqMap[$val];
        if (!isset($this->groupMap[$freq])) {
            $this->groupMap[$freq] = array();
        }
        array_push($this->groupMap[$freq], $val);
        
        $this->maxFreq = max($this->maxFreq, $freq);
    }
  
    function pop() {
        $val = array_pop($this->groupMap[$this->maxFreq]);
        
        $this->freqMap[$val]--;
        
        if (empty($this->groupMap[$this->maxFreq])) {
            $this->maxFreq--;
        }
        
        return $val;
    }
}
