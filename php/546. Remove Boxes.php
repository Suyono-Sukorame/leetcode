class Solution {

/**
 * @param Integer[] $boxes
 * @return Integer
 */
function removeBoxes($boxes) {
    $merged = [];
    $points = [];
    $count = 1;

    for ($i = 0; $i < count($boxes); $i++) {
        if ($boxes[$i] !== $boxes[$i + 1]) {
            $merged[] = $boxes[$i];
            $points[] = $count;
            $count = 1;
            continue;
        }
        $count++;
    }

    $size = count($merged);
    $dp = [];
    for ($i = 0; $i < $size; $i++) {
        $dp[$i] = [];
        for ($j = 0; $j < $size; $j++) {
            $dp[$i][$j] = array_fill(0, count($boxes), 0);
        }
    }

    $calculate = function($l, $r, $p) use (&$calculate, &$dp, &$merged, &$points) {
        if ($l > $r) {
            return 0;
        }

        if ($dp[$l][$r][$p]) {
            return $dp[$l][$r][$p];
        }

        $point = $points[$l] + $p;
        $max = $point * $point + $calculate($l + 1, $r, 0);

        for ($i = $l + 1; $i <= $r; $i++) {
            if ($merged[$i] === $merged[$l]) {
                $max = max($max, $calculate($l + 1, $i - 1, 0) + $calculate($i, $r, $point));
            }
        }

        $dp[$l][$r][$p] = $max;
        return $max;
    };

    return $calculate(0, $size - 1, 0);
}
}
