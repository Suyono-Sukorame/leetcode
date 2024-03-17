class SnapshotArray {
    private $snapshots;
    private $snap_id;
    
    function __construct($length) {
        $this->snapshots = [];
        $this->snap_id = 0;
        for ($i = 0; $i < $length; $i++) {
            $this->snapshots[$i][0] = 0;
        }
    }
  
    function set($index, $val) {
        $this->snapshots[$index][$this->snap_id] = $val;
    }
  
    function snap() {
        return $this->snap_id++;
    }
  
    function get($index, $snap_id) {
        if (isset($this->snapshots[$index][$snap_id])) {
            return $this->snapshots[$index][$snap_id];
        } else {
            $prev_snap_id = $snap_id - 1;
            while ($prev_snap_id >= 0 && !isset($this->snapshots[$index][$prev_snap_id])) {
                $prev_snap_id--;
            }
            return ($prev_snap_id >= 0) ? $this->snapshots[$index][$prev_snap_id] : 0;
        }
    }
}
