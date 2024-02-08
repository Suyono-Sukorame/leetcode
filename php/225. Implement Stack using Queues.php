class MyStack {
    private $queue;
    
    function __construct() {
        $this->queue = new SplQueue();
    }

    /**
     * @param Integer $x
     * @return NULL
     */
    function push($x) {
        $this->queue->enqueue($x);
        $size = $this->queue->count();
        for ($i = 0; $i < $size - 1; $i++) {
            $this->queue->enqueue($this->queue->dequeue());
        }
    }

    /**
     * @return Integer
     */
    function pop() {
        return $this->queue->dequeue();
    }

    /**
     * @return Integer
     */
    function top() {
        return $this->queue->bottom();
    }

    /**
     * @return Boolean
     */
    function empty() {
        return $this->queue->isEmpty();
    }
}
