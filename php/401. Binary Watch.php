class Solution {

/**
 * @param Integer $turnedOn
 * @return String[]
 */
function readBinaryWatch($turnedOn) {
    $result = [];
    for ($hour = 0; $hour < 12; $hour++) {
        for ($minute = 0; $minute < 60; $minute++) {
            if (self::countBits($hour) + self::countBits($minute) == $turnedOn) {
                $time = sprintf("%d:%02d", $hour, $minute);
                $result[] = $time;
            }
        }
    }
    return $result;
}

function countBits($num) {
    $count = 0;
    while ($num > 0) {
        $count += $num & 1;
        $num >>= 1;
    }
    return $count;
}
}
