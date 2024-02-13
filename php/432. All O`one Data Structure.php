class AllOne {
    private $map;
    private $preOp;

    function __construct() {
        $this->map = [];
        $this->preOp = "start"; // record pre operation
    }
  
    function inc($key) {
        $this->map[$key] = ($this->map[$key] ?? 0) + 1;
        $this->preOp = 'inc';
    }
  
    function dec($key) {
        if (isset($this->map[$key])) {
            $occ = $this->map[$key];
            if ($occ == 1) {
                unset($this->map[$key]);
            } else {
                $this->map[$key] = $occ - 1;
            }
            $this->preOp = 'dec';
        }
    }
  
    function getMaxKey() {
        if ($this->preOp != 'max') {
            arsort($this->map);
        }
        $this->preOp = 'max';
        return empty($this->map) ? "" : key($this->map);
    }
  
    function getMinKey() {
        if ($this->preOp != 'min') {
            asort($this->map);
        }
        $this->preOp = 'min';
        return empty($this->map) ? "" : key($this->map);
    }
}

$obj = new AllOne();
$obj->inc("hello");
$obj->inc("hello");
$ret_3 = $obj->getMaxKey();
$ret_4 = $obj->getMinKey();
echo "Max Key: $ret_3\n";
echo "Min Key: $ret_4\n";
