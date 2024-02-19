class Solution {
    /**
     * @param Integer[][] $grid
     * @return Integer
     */
    function cherryPickup($grid) {
        $n = count($grid);
        $memo = array_fill(0, $n, array_fill(0, $n, array_fill(0, $n, -1)));
        return max(0, $this->dp($grid, $memo, 0, 0, 0));
    }

    function dp($grid, &$memo, $x1, $y1, $x2) {
        $n = count($grid);
        $y2 = $x1 + $y1 - $x2;

        if ($x1 >= $n || $y1 >= $n || $x2 >= $n || $y2 >= $n || $grid[$x1][$y1] == -1 || $grid[$x2][$y2] == -1) {
            return -999999;
        }

        if ($x1 == $n - 1 && $y1 == $n - 1) {
            return $grid[$x1][$y1];
        }

        if ($memo[$x1][$y1][$x2] != -1) {
            return $memo[$x1][$y1][$x2];
        }

        $ans = $grid[$x1][$y1];
        if ($x1 != $x2 || $y1 != $y2) {
            $ans += $grid[$x2][$y2];
        }

        $ans += max(
            max($this->dp($grid, $memo, $x1 + 1, $y1, $x2 + 1), $this->dp($grid, $memo, $x1 + 1, $y1, $x2)),
            max($this->dp($grid, $memo, $x1, $y1 + 1, $x2 + 1), $this->dp($grid, $memo, $x1, $y1 + 1, $x2))
        );

        $memo[$x1][$y1][$x2] = $ans;
        return $ans;
    }
}