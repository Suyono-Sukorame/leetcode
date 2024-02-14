class Solution {

/**
 * @param Integer[] $houses
 * @param Integer[] $heaters
 * @return Integer
 */
function findRadius($houses, $heaters) {
    sort($heaters);
    $maxRadius = 0;
    
    foreach ($houses as $house) {
        $heaterIdx = $this->findClosestHeater($house, $heaters);
        $distance = abs($house - $heaters[$heaterIdx]);
        if ($heaterIdx > 0) {
            $distance = min($distance, abs($house - $heaters[$heaterIdx - 1]));
        }
        $maxRadius = max($maxRadius, $distance);
    }
    
    return $maxRadius;
}

function findClosestHeater($house, $heaters) {
    $left = 0;
    $right = count($heaters) - 1;
    
    while ($left < $right) {
        $mid = $left + intval(($right - $left) / 2);
        if ($heaters[$mid] < $house) {
            $left = $mid + 1;
        } else {
            $right = $mid;
        }
    }
    
    return $left;
}
}
