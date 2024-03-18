class Solution {

/**
 * @param Integer[] $distance
 * @param Integer $start
 * @param Integer $destination
 * @return Integer
 */
function distanceBetweenBusStops($distance, $start, $destination) {
    $totalStops = count($distance);
    $clockwiseDistance = 0;
    $counterclockwiseDistance = 0;

    for ($i = $start; $i != $destination; $i = ($i + 1) % $totalStops) {
        $clockwiseDistance += $distance[$i];
    }

    for ($i = $destination; $i != $start; $i = ($i + 1) % $totalStops) {
        $counterclockwiseDistance += $distance[$i];
    }

    return min($clockwiseDistance, $counterclockwiseDistance);
}
}
