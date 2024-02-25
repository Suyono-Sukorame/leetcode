class MyHashSet {
    /**
     * @var array
     */
    private $hashSet;

    function __construct() {
        $this->hashSet = [];
    }
  
    /**
     * @param Integer $key
     * @return NULL
     */
    function add($key) {
        if (!$this->contains($key)) {
            $this->hashSet[$key] = true;
        }
    }
  
    /**
     * @param Integer $key
     * @return NULL
     */
    function remove($key) {
        if ($this->contains($key)) {
            unset($this->hashSet[$key]);
        }
    }
  
    /**
     * @param Integer $key
     * @return Boolean
     */
    function contains($key) {
        return isset($this->hashSet[$key]);
    }
}

/**
 * Your MyHashSet object will be instantiated and called as such:
 * $obj = MyHashSet();
 * $obj->add($key);
 * $obj->remove($key);
 * $ret_3 = $obj->contains($key);
 */
