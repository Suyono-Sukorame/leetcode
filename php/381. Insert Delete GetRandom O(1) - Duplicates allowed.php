class RandomizedCollection {
    private $nums; // Array to store numbers
    private $positions; // Hash map to store positions of numbers
    /**
     * Initialize your data structure here.
     */
    function __construct() {
        $this->nums = array();
        $this->positions = array();
    }
  
    /**
     * Inserts a value to the collection. Returns true if the collection did not already contain the specified element.
     * @param Integer $val
     * @return Boolean
     */
    function insert($val) {
        $this->nums[] = $val;
        $this->positions[$val][] = count($this->nums) - 1;
        return count($this->positions[$val]) === 1;
    }
  
    /**
     * @param Integer $val
     * @return Boolean
     */
    function remove($val) {
        if (!isset($this->positions[$val]) || empty($this->positions[$val])) {
            return false;
        }
        $last = array_pop($this->nums);
        $pos = array_pop($this->positions[$val]);
        if ($pos !== count($this->nums)) {
            $this->nums[$pos] = $last;
            $this->positions[$last] = array_diff($this->positions[$last], array(count($this->nums))); // Update position of the last element
            $this->positions[$last][] = $pos;
        }
        if (empty($this->positions[$val])) {
            unset($this->positions[$val]);
        }
        return true;
    }
  
    /**
     * Get a random element from the collection.
     * @return Integer
     */
    function getRandom() {
        return $this->nums[array_rand($this->nums)];
    }
}

/**
 * Your RandomizedCollection object will be instantiated and called as such:
 * $obj = RandomizedCollection();
 * $ret_1 = $obj->insert($val);
 * $ret_2 = $obj->remove($val);
 * $ret_3 = $obj->getRandom();
 */
