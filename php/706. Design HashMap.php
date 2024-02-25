class MyHashMap {
    /**
     * @var array
     */
    private $hashMap;

    function __construct() {
        $this->hashMap = [];
    }
  
    /**
     * @param Integer $key
     * @param Integer $value
     * @return NULL
     */
    function put($key, $value) {
        $this->hashMap[$key] = $value;
    }
  
    /**
     * @param Integer $key
     * @return Integer
     */
    function get($key) {
        return isset($this->hashMap[$key]) ? $this->hashMap[$key] : -1;
    }
  
    /**
     * @param Integer $key
     * @return NULL
     */
    function remove($key) {
        unset($this->hashMap[$key]);
    }
}

/**
 * Your MyHashMap object will be instantiated and called as such:
 * $obj = MyHashMap();
 * $obj->put($key, $value);
 * $ret_2 = $obj->get($key);
 * $obj->remove($key);
 */
