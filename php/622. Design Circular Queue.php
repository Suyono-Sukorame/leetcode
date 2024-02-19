class MyCircularQueue {
    private $a;
    private $front = 0;
    private $rear = -1;
    private $len = 0;

    public function __construct($k) { 
        $this->a = array_fill(0, $k, null);
    }

    public function enQueue($val) {
        if (!$this->isFull()) {
            $this->rear = ($this->rear + 1) % count($this->a);
            $this->a[$this->rear] = $val;
            $this->len++;
            return true;
        } else {
            return false;
        }
    }

    public function deQueue() {
        if (!$this->isEmpty()) {
            $this->front = ($this->front + 1) % count($this->a);
            $this->len--;
            return true;
        } else {
            return false;
        }
    }

    public function Front() { 
        return $this->isEmpty() ? -1 : $this->a[$this->front];
    }

    public function Rear() {
        return $this->isEmpty() ? -1 : $this->a[$this->rear];
    }

    public function isEmpty() { 
        return $this->len == 0;
    }

    public function isFull() { 
        return $this->len == count($this->a);
    }
}
