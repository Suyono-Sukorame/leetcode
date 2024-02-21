class MyCircularDeque {
    
    private $arr;
    private $size;
    private $k;
    
    /**
     * Initialize your data structure here. Set the size of the deque to be k.
     * @param Integer $k
     */
    function __construct($k) {
        $this->arr = [];
        $this->k = $k;
        $this->size = $k;
    }
  
    /**
     * Adds an item at the front of Deque. Return true if the operation is successful.
     * @param Integer $value
     * @return Boolean
     */
    function insertFront($value) {
        if ($this->size > 0) {
            array_unshift($this->arr, $value);
            $this->size--;
            return true;
        } else {
            return false;
        }
    }
  
    /**
     * Adds an item at the rear of Deque. Return true if the operation is successful.
     * @param Integer $value
     * @return Boolean
     */
    function insertLast($value) {
        if ($this->size > 0) {
            array_push($this->arr, $value);
            $this->size--;
            return true;
        } else {
            return false;
        }
    }
  
    /**
     * Deletes an item from the front of Deque. Return true if the operation is successful.
     * @return Boolean
     */
    function deleteFront() {
        if ($this->size < $this->k) {
            array_shift($this->arr);
            $this->size++;
            return true;
        } else {
            return false;
        }
    }
  
    /**
     * Deletes an item from the rear of Deque. Return true if the operation is successful.
     * @return Boolean
     */
    function deleteLast() {
        if ($this->size < $this->k) {
            array_pop($this->arr);
            $this->size++;
            return true;
        } else {
            return false;
        }
    }
  
    /**
     * Get the front item from the deque.
     * @return Integer
     */
    function getFront() {
        if ($this->size < $this->k) {
            return $this->arr[0];
        }
        return -1;
    }
  
    /**
     * Get the last item from the deque.
     * @return Integer
     */
    function getRear() {
        if ($this->size < $this->k) {
            return $this->arr[count($this->arr) - 1];
        }
        return -1;
    }
  
    /**
     * Checks whether the circular deque is empty or not.
     * @return Boolean
     */
    function isEmpty() {
        if ($this->size == $this->k) {
            return true;
        } else {
            return false;
        }
    }
  
    /**
     * Checks whether the circular deque is full or not.
     * @return Boolean
     */
    function isFull() {
        if ($this->size == 0) {
            return true;
        } else {
            return false;
        }
    }
}
