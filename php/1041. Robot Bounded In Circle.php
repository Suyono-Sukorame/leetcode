class Solution {
    /**
     * @param String $instructions
     * @return Boolean
     */
    function isRobotBounded($instructions) {
        $x = 0;
        $y = 0;
        $direction = 0;

        $dx = [0, 1, 0, -1];
        $dy = [1, 0, -1, 0];

        foreach (str_split($instructions) as $instruction) {
            if ($instruction == 'G') {
                $x += $dx[$direction];
                $y += $dy[$direction];
            } elseif ($instruction == 'L') {
                $direction = ($direction + 3) % 4;
            } elseif ($instruction == 'R') {
                $direction = ($direction + 1) % 4;
            }
        }

        return ($x == 0 && $y == 0) || $direction != 0;
    }
}
