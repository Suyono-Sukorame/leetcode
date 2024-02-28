class Solution {
    /**
     * @param Integer $i
     * @param Integer $j
     * @param Integer[] $seats
     * @return Integer
     */
    function get_gap($i, $j, $seats) {
        if ($i == -1) {
            return $j;
        } elseif ($j == count($seats) - 1 && $seats[$j] == 0) {
            return count($seats) - 1 - $i;
        } else {
            return max(intdiv($j - $i, 2), 1);
        }
    }

    /**
     * @param Integer[] $seats
     * @return Integer
     */
    function maxDistToClosest($seats) {
        $last_seated = -1;
        $max_so_far = 0;
        
        for ($i = 0; $i < count($seats); $i++) {
            if ($seats[$i] == 1 || $i == count($seats) - 1) {
                $max_so_far = max($max_so_far, $this->get_gap($last_seated, $i, $seats));
                $last_seated = $i;
            }
        }
        
        return $max_so_far;
    }
}
