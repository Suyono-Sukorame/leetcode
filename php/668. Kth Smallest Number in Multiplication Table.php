class Solution {

/**
 * @param Integer $m
 * @param Integer $n
 * @param Integer $k
 * @return Integer
 */
function findKthNumber($m, $n, $k) {
    $left = 1;
    $right = $m * $n;

    while ($left < $right) {
        $mid = $left + floor(($right - $left) / 2);
        if ($this->countLessEqual($mid, $m, $n) < $k) {
            $left = $mid + 1;
        } else {
            $right = $mid;
        }
    }

    return $left;
}

function countLessEqual($target, $m, $n) {
    $count = 0;
    for ($i = 1; $i <= $m; $i++) {
        $count += min(floor($target / $i), $n);
    }
    return $count;
}
}
