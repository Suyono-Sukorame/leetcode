class Solution {

/**
 * @param Integer $hour
 * @param Integer $minutes
 * @return Float
 */
function angleClock($hour, $minutes) {
    $minute_angle = $minutes * 6;
    $hour_angle = ($hour % 12) * 30 + $minutes * 0.5;
    $angle = abs($hour_angle - $minute_angle);
    $angle = min($angle, 360 - $angle);
    return $angle;
}
}

$solution = new Solution();
$hour = 12;
$minutes = 30;
echo $solution->angleClock($hour, $minutes);
