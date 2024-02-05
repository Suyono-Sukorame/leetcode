class RandomizedSet {
    private $nums;
    private $indexMap;

    function __construct() {
        $this->nums = array();
        $this->indexMap = array();
    }

    function insert($val) {
        if (array_key_exists($val, $this->indexMap)) {
            return false;
        }

        $this->nums[] = $val;
        $this->indexMap[$val] = count($this->nums) - 1;

        return true;
    }

    function remove($val) {
        if (!array_key_exists($val, $this->indexMap)) {
            return false;
        }

        $lastNum = $this->nums[count($this->nums) - 1];
        $valIndex = $this->indexMap[$val];

        $this->nums[$valIndex] = $lastNum;
        $this->indexMap[$lastNum] = $valIndex;

        array_pop($this->nums);
        unset($this->indexMap[$val]);

        return true;
    }

    function getRandom() {
        $randomIndex = rand(0, count($this->nums) - 1);
        return $this->nums[$randomIndex];
    }
}

/**
 * Your RandomizedSet object will be instantiated and called as such:
 * $obj = new RandomizedSet();
 * $ret_1 = $obj->insert($val);
 * $ret_2 = $obj->remove($val);
 * $ret_3 = $obj->getRandom();
 */
