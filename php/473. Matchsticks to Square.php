class Solution {

/**
 * @param Integer[] $matchsticks
 * @return Boolean
 */
function makesquare($matchsticks) {
    $perimeter = array_sum($matchsticks);
    if ($perimeter % 4 != 0 || count($matchsticks) < 4) return false;

    $sideLen = $perimeter / 4;
    $sides = array_fill(0, 4, 0);
    $len = count($matchsticks);
    rsort($matchsticks);

    $solve = function ($x = 0) use (&$solve, &$sides, $matchsticks, $len, $sideLen) {
        if ($x == $len) {
            return array_sum($sides) == $sideLen * 4;
        }

        for ($i = 0; $i < 4; $i++) {
            if ($sides[$i] + $matchsticks[$x] > $sideLen) {
                continue;
            }
            $sides[$i] += $matchsticks[$x];
            if ($solve($x + 1)) return true;
            $sides[$i] -= $matchsticks[$x];
        }
        return false;
    };

    return $solve();
}
}
