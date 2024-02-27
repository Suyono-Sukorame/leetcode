class Solution {

/**
 * @param Integer $target
 * @return Integer
 */
function racecar($target) {
    $queue = new SplQueue();
    $seen = [];

    $queue->enqueue([0, 0, 1]);
    $seen["0/1"] = true;

    while (!$queue->isEmpty()) {
        [$curLevel, $curPos, $curSpeed] = $queue->dequeue();
        $combination = $curPos . " " . $curSpeed;

        if ($curPos == $target) return $curLevel;

        if (isset($seen[$combination])) continue;

        $queue->enqueue([$curLevel + 1, $curPos + $curSpeed, $curSpeed * 2]);
        $seen[$curPos . "/" . $curSpeed] = true;

        if (($curPos + $curSpeed > $target && $curSpeed > 0) ||
            ($curPos + $curSpeed < $target && $curSpeed < 0)) {
            $nextSpeed = $curSpeed > 0 ? -1 : 1;
            $queue->enqueue([$curLevel + 1, $curPos, $nextSpeed]);
        }
    }

    return -1;
}
}
