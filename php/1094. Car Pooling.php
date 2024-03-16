class Solution {

/**
 * @param Integer[][] $trips
 * @param Integer $capacity
 * @return Boolean
 */
function carPooling($trips, $capacity) {
    $count = array_fill(0, 1001, 0);
    foreach ($trips as $trip) {
        $count[$trip[1]] += $trip[0];
        $count[$trip[2]] -= $trip[0];
    }

    $curr = 0;
    foreach ($count as $i) {
        $curr += $i;
        if ($curr > $capacity) {
            return false;
        }
    }

    return true;
}
}

$solution = new Solution();
$trips = [[2,1,5],[3,3,7]];
$capacity = 4;
$result = $solution->carPooling($trips, $capacity);
echo $result ? "true" : "false";
