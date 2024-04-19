class BrowserHistory {
    private $ele;
    private $vc;

    /**
     * @param String $homepage
     */
    function __construct($homepage) {
        $this->vc = [$homepage];
        $this->ele = 0;
    }

    /**
     * @param String $url
     * @return NULL
     */
    function visit($url) {
        $l = count($this->vc) - 1;
        while ($l > $this->ele) {
            array_pop($this->vc);
            $l--;
        }
        $this->ele++;
        $this->vc[] = $url;
    }

    /**
     * @param Integer $steps
     * @return String
     */
    function back($steps) {
        $this->ele -= $steps;
        if ($this->ele < 0) $this->ele = 0;
        return $this->vc[$this->ele];
    }

    /**
     * @param Integer $steps
     * @return String
     */
    function forward($steps) {
        $this->ele += $steps;
        $n = count($this->vc);
        if ($this->ele >= $n) $this->ele = $n - 1;
        return $this->vc[$this->ele];
    }
}

/**
 * Your BrowserHistory object will be instantiated and called as such:
 * $obj = BrowserHistory($homepage);
 * $obj->visit($url);
 * $ret_2 = $obj->back($steps);
 * $ret_3 = $obj->forward($steps);
 */
