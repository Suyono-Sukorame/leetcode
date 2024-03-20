class Solution {

/**
 * @param Integer[] $startTime
 * @param Integer[] $endTime
 * @param Integer[] $profit
 * @return Integer
 */
function jobScheduling($startTime, $endTime, $profit) {
    $jobs = array_map(null, $startTime, $endTime, $profit);
    usort($jobs, function ($a, $b) { return $a[1] - $b[1]; });

    $dp = [[0, 0]];

    foreach ($jobs as [$start, $end, $prof]) {
        if (($maxProfit = $dp[$this->binarySearch($dp, $start) - 1][1] + $prof) > end($dp)[1]) $dp[] = [$end, $maxProfit];
    }

    return end($dp)[1];
}

private function binarySearch($dp, $start) {
    $left = 0;
    $right = count($dp);

    while ($left < $right) {
        $mid = ($left + $right) >> 1;
        $dp[$mid][0] > $start ? $right = $mid : $left = $mid + 1;
    }

    return $left;
}
}
