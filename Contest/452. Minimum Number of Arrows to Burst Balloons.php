class Solution {

/**
 * @param Integer[][] $points
 * @return Integer
 */
function findMinArrowShots($points) {
    usort($points, function($a, $b) {
        if ($a[0] == $b[0]) {
            return $a[1] - $b[1];
        }
        return $a[0] - $b[0];
    });
    
    $count = 1;
    $nextIdx = 0;
    while ($nextIdx < count($points)) {
        $p = $points[$nextIdx];
        $idxChanged = false;
        for ($j = $nextIdx + 1; $j < count($points); $j++) {
            $temp = $points[$j];
            if ($temp[1] < $p[1]) {
                $p[1] = $temp[1];
            }
            if ($p[1] < $temp[0]) {
                $idxChanged = true;
                $nextIdx = $j;
                $count++;
                break;
            }
        }
        if (!$idxChanged) {
            $nextIdx++;
        }
    }
    return $count;
}
}