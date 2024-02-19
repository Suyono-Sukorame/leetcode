class MyCalendarThree {
    private $maxInter = 0;
    private $record = [];

    function __construct() {
        
    }
  
    /**
     * @param Integer $startTime
     * @param Integer $endTime
     * @return Integer
     */
    function book($startTime, $endTime) {
        $this->maxInter = max($this->maxInter, $this->insert($startTime, $endTime));
        return $this->maxInter;
    }
    
    function insert($start, $end) {
        if (empty($this->record)) {
            array_push($this->record, [$start, 1]);
            array_push($this->record, [$end, 0]);
            return 1;
        }
        
        $cur = 1;
        $s = $this->getIndex($start);

        if ($s == count($this->record)) {
            array_push($this->record, [$start, 1]);
            array_push($this->record, [$end, 0]);
            return 1;
        }

        if ($this->record[$s][0] == $start) {
            $this->record[$s][1]++;
        } else {
            $preHeight = $s > 0 ? $this->record[$s - 1][1] : 0;
            array_splice($this->record, $s, 0, [[$start, $preHeight + 1]]);
        }
        $cur = max($cur, $this->record[$s][1]);

        $e = $this->getIndex($end);

        for ($i = $s + 1; $i < $e; $i++) {
            $this->record[$i][1]++;
            $cur = max($cur, $this->record[$i][1]);
        }

        if ($e == count($this->record)) {
            array_push($this->record, [$end, 0]);
            return $cur;
        }

        if ($this->record[$e][0] > $end) {
            array_splice($this->record, $e, 0, [[$end, $this->record[$e - 1][1] - 1]]);
        }

        return $cur;
    }

    function getIndex($target) {
        $left = 0;
        $right = count($this->record) - 1;

        while ($left < $right) {
            $mid = $left + intval(($right - $left) / 2);
            if ($this->record[$mid][0] < $target) {
                $left = $mid + 1;
            } else {
                $right = $mid;
            }
        }

        return $this->record[$left][0] < $target ? $left + 1 : $left;
    }
}

$obj = new MyCalendarThree();
$ret_1 = $obj->book(10, 20);
echo $ret_1;

$ret_2 = $obj->book(50, 60);
echo $ret_2;
