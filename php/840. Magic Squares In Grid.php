class Solution {
    /**
     * @param Integer[][] $grid
     * @return Integer
     */
    function numMagicSquaresInside($grid) {
        $dir = [0, 1, -1];
        $count = 0;
        $rowCount = count($grid);
        $colCount = count($grid[0]);
        
        for ($i = 1; $i < $rowCount - 1; $i++) {
            for ($j = 1; $j < $colCount - 1; $j++) {
                $sum = $grid[$i - 1][$j - 1] + $grid[$i][$j] + $grid[$i + 1][$j + 1];
                if ($sum != $grid[$i + 1][$j - 1] + $grid[$i][$j] + $grid[$i - 1][$j + 1]) continue;
                
                $valid = true;
                foreach ($dir as $d) {
                    if ($sum != $grid[$i + $d][$j - 1] + $grid[$i + $d][$j] + $grid[$i + $d][$j + 1]) {
                        $valid = false;
                        break;
                    }
                    if ($sum != $grid[$i + 1][$j + $d] + $grid[$i][$j + $d] + $grid[$i - 1][$j + $d]) {
                        $valid = false;
                        break;
                    }
                }
                
                if (!$valid) continue;
                
                $includesZtoN = array_fill(0, 9, false);
                foreach ($dir as $d1) {
                    foreach ($dir as $d2) {
                        $cur = $grid[$i + $d1][$j + $d2];
                        if ($cur > 9 || $cur < 1 || $includesZtoN[$cur - 1]) {
                            $valid = false;
                            break 2;
                        }
                        $includesZtoN[$cur - 1] = true;
                    }
                }
                
                if ($valid) {
                    $count++;
                }
            }
        }
        
        return $count;
    }
}