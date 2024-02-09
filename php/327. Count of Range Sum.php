class Solution {

/**
 * @param Integer[] $nums
 * @param Integer $lower
 * @param Integer $upper
 * @return Integer
 */
function countRangeSum($nums, $lower, $upper) {
    $n = count($nums);
    $sums = array_fill(0, $n + 1, 0);
    for ($i = 0; $i < $n; ++$i)
        $sums[$i + 1] = $sums[$i] + $nums[$i];
    return $this->countWhileMergeSort($sums, 0, $n + 1, $lower, $upper);
}

function countWhileMergeSort(&$sums, $start, $end, $lower, $upper) {
    if ($end - $start <= 1) return 0;
    $mid = ($start + $end) >> 1; // Gunakan operator pembagian integer
    $count = $this->countWhileMergeSort($sums, $start, $mid, $lower, $upper) 
            + $this->countWhileMergeSort($sums, $mid, $end, $lower, $upper);
    $j = $mid;
    $k = $mid;
    $t = $mid;
    $cache = [];
    for ($i = $start, $r = 0; $i < $mid; ++$i, ++$r) {
        while ($k < $end && $sums[$k] - $sums[$i] < $lower) $k++;
        while ($j < $end && $sums[$j] - $sums[$i] <= $upper) $j++;
        while ($t < $end && $sums[$t] < $sums[$i]) $cache[$r++] = $sums[$t++];
        $cache[$r] = $sums[$i];
        $count += $j - $k;
    }
    for ($i = $start; $i < $t; $i++) {
        $sums[$i] = $cache[$i - $start];
    }
    return $count;
}
}
