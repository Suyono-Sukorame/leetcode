class Solution {

/**
 * @param Integer[] $weights
 * @param Integer $days
 * @return Integer
 */
function shipWithinDays($weights, $days) {
    $left = max($weights);
    $right = array_sum($weights);

    while ($left < $right) {
        $mid = $left + intval(($right - $left) / 2);
        $currentDays = 1;
        $currentWeight = 0;

        foreach ($weights as $weight) {
            if ($currentWeight + $weight > $mid) {
                $currentDays++;
                $currentWeight = 0;
            }
            $currentWeight += $weight;
        }

        if ($currentDays > $days) {
            $left = $mid + 1;
        } else {
            $right = $mid;
        }
    }

    return $left;
}
}
