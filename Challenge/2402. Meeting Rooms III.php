class Solution {

/**
 * @param Integer $n
 * @param Integer[][] $meetings
 * @return Integer
 */
function mostBooked($n, $meetings) {
    $roomsMeetingsCounter = array_fill(0, $n, 0);
    $availableRooms = array_fill(0, $n, -1);

    usort($meetings, function($a, $b) {
        return $a[0] - $b[0];
    });

    foreach ($meetings as $meeting) {
        [$start, $end] = $meeting;
        $earliestRoomIdx = 0;
        $earliestEndTime = PHP_INT_MAX;
        $isAvailableRoomExist = false;

        for ($i = 0; $i < $n; $i++) {
            if ($availableRooms[$i] <= $start) {
                $roomsMeetingsCounter[$i]++;
                $availableRooms[$i] = $end;
                $isAvailableRoomExist = true;
                break;
            }

            if ($availableRooms[$i] < $earliestEndTime) {
                $earliestEndTime = $availableRooms[$i];
                $earliestRoomIdx = $i;
            }
        }

        if (!$isAvailableRoomExist) {
            $roomsMeetingsCounter[$earliestRoomIdx]++;
            $availableRooms[$earliestRoomIdx] += $end - $start;
        }
    }

    return array_search(max($roomsMeetingsCounter), $roomsMeetingsCounter);
}
}
