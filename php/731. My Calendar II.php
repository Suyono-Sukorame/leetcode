class MyCalendarTwo {
    private $events;
    private $overlaps;

    function __construct() {
        $this->events = [];
        $this->overlaps = [];
    }
  
    function book($start, $end) {
        foreach ($this->overlaps as $overlap) {
            if ($start < $overlap[1] && $end > $overlap[0]) {
                return false;
            }
        }
        
        foreach ($this->events as $event) {
            $s = max($start, $event[0]);
            $e = min($end, $event[1]);
            if ($s < $e) {
                $this->overlaps[] = [$s, $e];
            }
        }
        
        $this->events[] = [$start, $end];
        return true;
    }
}

/**
 * Your MyCalendarTwo object will be instantiated and called as such:
 * $obj = MyCalendarTwo();
 * $ret_1 = $obj->book($start, $end);
 */
