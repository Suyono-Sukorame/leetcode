class Solution {

/**
 * @param Integer[][] $img1
 * @param Integer[][] $img2
 * @return Integer
 */
function largestOverlap($img1, $img2) {
    $n = count($img1);
    $maxOverlap = 0;
    
    for ($rowShift = -$n + 1; $rowShift < $n; $rowShift++) {
        for ($colShift = -$n + 1; $colShift < $n; $colShift++) {
            $overlap = 0;
            for ($i = 0; $i < $n; $i++) {
                for ($j = 0; $j < $n; $j++) {
                    $x1 = $i + $rowShift;
                    $y1 = $j + $colShift;
                    if ($x1 >= 0 && $x1 < $n && $y1 >= 0 && $y1 < $n) {
                        $overlap += $img1[$i][$j] & $img2[$x1][$y1];
                    }
                }
            }
            $maxOverlap = max($maxOverlap, $overlap);
        }
    }
    
    return $maxOverlap;
}
}