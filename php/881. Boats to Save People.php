class Solution {

/**
 * @param Integer[] $people
 * @param Integer $limit
 * @return Integer
 */
function numRescueBoats($people, $limit) {
    sort($people);
    $left = 0;
    $right = count($people) - 1;
    $boats = 0;

    while ($left <= $right) {
        if ($people[$left] + $people[$right] <= $limit) {
            $left++;
        }
        $right--;
        $boats++;
    }

    return $boats;
}
}
