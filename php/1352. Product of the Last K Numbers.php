class ProductOfNumbers {
    private $list;
    private $prev;
    
    function __construct() {
        $this->list = [];
        $this->prev = 1;
    }
    
    function add($num) {
        if ($num == 0) {
            $this->list = [];
            $this->prev = 1;
        } else {
            $this->prev *= $num;
            $this->list[] = $this->prev;
        }
    }
    
    function getProduct($k) {
        $n = count($this->list);
        if ($k == $n) {
            return $this->list[$n - 1];
        } elseif ($k > $n) {
            return 0;
        } else {
            return $this->list[$n - 1] / $this->list[$n - $k - 1];
        }
    }
}

/**
 * Your ProductOfNumbers object will be instantiated and called as such:
 * $obj = ProductOfNumbers();
 * $obj->add($num);
 * $ret_2 = $obj->getProduct($k);
 */
