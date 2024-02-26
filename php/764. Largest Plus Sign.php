class Solution {

/**
 * @param Integer $n
 * @param Integer[][] $mines
 * @return Integer
 */
function orderOfLargestPlusSign($n, $mines) {
    $grid = array_fill(0, $n, array_fill(0, $n, 1));

    foreach ($mines as $mine) {
        $grid[$mine[0]][$mine[1]] = 0;
    }

    $left = array_fill(0, $n, array_fill(0, $n, 0));
    $right = array_fill(0, $n, array_fill(0, $n, 0));
    $up = array_fill(0, $n, array_fill(0, $n, 0));
    $down = array_fill(0, $n, array_fill(0, $n, 0));

    for ($i = 0; $i < $n; $i++) {
        for ($j = 0; $j < $n; $j++) {
            if ($grid[$i][$j] == 1) {
                $left[$i][$j] = ($j == 0 ? 1 : $left[$i][$j - 1] + 1);
                $up[$i][$j] = ($i == 0 ? 1 : $up[$i - 1][$j] + 1);
            }
        }
    }

    for ($i = $n - 1; $i >= 0; $i--) {
        for ($j = $n - 1; $j >= 0; $j--) {
            if ($grid[$i][$j] == 1) {
                $right[$i][$j] = ($j == $n - 1 ? 1 : $right[$i][$j + 1] + 1);
                $down[$i][$j] = ($i == $n - 1 ? 1 : $down[$i + 1][$j] + 1);
            }
        }
    }

    $maxOrder = 0;

    for ($i = 0; $i < $n; $i++) {
        for ($j = 0; $j < $n; $j++) {
            $maxOrder = max($maxOrder, min($left[$i][$j], $right[$i][$j], $up[$i][$j], $down[$i][$j]));
        }
    }

    return $maxOrder;
}
}
