class TimeMap {
    private $data;

    function __construct() {
        $this->data = [];
    }

    function set($key, $value, $timestamp) {
        if (!isset($this->data[$key])) {
            $this->data[$key] = [];
        }
        $this->data[$key][$timestamp] = $value;
    }

    function get($key, $timestamp) {
        if (!isset($this->data[$key])) {
            return "";
        }
        
        $timestamps = array_keys($this->data[$key]);
        $index = $this->binarySearch($timestamps, $timestamp);
        
        if ($index >= 0) {
            return $this->data[$key][$timestamps[$index]];
        } elseif ($index == -1) {
            return "";
        } else {
            return $this->data[$key][$timestamps[-$index-2]];
        }
    }
    
    function binarySearch($timestamps, $timestamp) {
        $left = 0;
        $right = count($timestamps) - 1;
        
        while ($left <= $right) {
            $mid = $left + intdiv($right - $left, 2);
            if ($timestamps[$mid] == $timestamp) {
                return $mid;
            } elseif ($timestamps[$mid] < $timestamp) {
                $left = $mid + 1;
            } else {
                $right = $mid - 1;
            }
        }
        
        return $right;
    }
}
