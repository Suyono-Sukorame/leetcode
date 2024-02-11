class SummaryRanges {
    private $sv;
    private $dv;
    
    function __construct() {
        $this->sv = []; // for store value
        $this->dv = []; // for display the value as get interval
    }
  
    /**
     * @param Integer $value
     * @return NULL
     */
    function addNum($value) {
        array_push($this->sv, $value);
        $this->sv = array_unique($this->sv);
        sort($this->sv);
        $n = count($this->sv);
        $this->dv = [];
        for ($i = 0; $i < $n; $i++) {
            if (isset($this->sv[$i + 1]) && $this->sv[$i + 1] - $this->sv[$i] == 1) {
                $x = $this->nextnolongcheck($i + 1, $this->sv);
                $this->dv[] = [$this->sv[$i], $this->sv[$x]];
                $i = $x;
                continue;
            }
            $this->dv[] = [$this->sv[$i], $this->sv[$i]];
        }
    }
    
    /**
     * @return Integer[][]
     */
    function getIntervals() {
        return $this->dv;
    }

    function nextnolongcheck($p, $sv) {
        if (isset($sv[$p + 1]) && $sv[$p + 1] - $sv[$p] == 1) {
            return $this->nextnolongcheck($p + 1, $sv);
        }
        return $p;
    }
}

$obj = new SummaryRanges();
$obj->addNum(1);
print_r($obj->getIntervals()); // Output: [[1, 1]]
$obj->addNum(3);
print_r($obj->getIntervals()); // Output: [[1, 1], [3, 3]]
$obj->addNum(7);
print_r($obj->getIntervals()); // Output: [[1, 1], [3, 3], [7, 7]]
$obj->addNum(2);
print_r($obj->getIntervals()); // Output: [[1, 3], [7, 7]]
$obj->addNum(6);
print_r($obj->getIntervals()); // Output: [[1, 3], [6, 7]]
