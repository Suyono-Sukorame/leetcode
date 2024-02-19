class RangeModule {
    private $ranges;

    function __construct() {
        $this->ranges = [];
    }
  
    function addRange($left, $right) {
        $newRanges = [];
        $inserted = false;
        foreach ($this->ranges as $range) {
            if ($right < $range[0]) {
                if (!$inserted) {
                    $newRanges[] = [$left, $right];
                    $inserted = true;
                }
                $newRanges[] = $range;
            } elseif ($left > $range[1]) {
                $newRanges[] = $range;
            } else {
                $left = min($left, $range[0]);
                $right = max($right, $range[1]);
            }
        }
        if (!$inserted) {
            $newRanges[] = [$left, $right];
        }
        $this->ranges = $newRanges;
    }
  
    function queryRange($left, $right) {
        foreach ($this->ranges as $range) {
            if ($left >= $range[0] && $right <= $range[1]) {
                return true;
            }
        }
        return false;
    }
  
    function removeRange($left, $right) {
        $newRanges = [];
        foreach ($this->ranges as $range) {
            if ($right <= $range[0] || $left >= $range[1]) {
                $newRanges[] = $range;
            } elseif ($left > $range[0] && $right < $range[1]) {
                $newRanges[] = [$range[0], $left];
                $newRanges[] = [$right, $range[1]];
            } elseif ($left > $range[0]) {
                $newRanges[] = [$range[0], $left];
            } elseif ($right < $range[1]) {
                $newRanges[] = [$right, $range[1]];
            }
        }
        $this->ranges = $newRanges;
    }
}