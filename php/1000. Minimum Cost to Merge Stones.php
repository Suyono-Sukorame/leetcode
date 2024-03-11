class Solution {

public function mergeStones($stones, $k) {
    $n = count($stones);
    if (($n - 1) % ($k - 1) > 0) return -1;

    $prefix = [];
    $prefix[0] = 0;
    $sum = 0;
    for ($i = 0; $i < $n; $i++) {
        $sum += $stones[$i];
        $prefix[$i + 1] = $sum;
    }

    $dp = [];
    for ($i = 0; $i < $n; $i++) {
        for ($j = 0; $j < $n; $j++) {
            $dp[$i][$j] = -1;
        }
    }

    return $this->check($prefix, $k, 0, $n - 1, $dp);
}

public function check($prefix, $k, $i, $j, &$dp) {
    if ($i >= $j) {
        return 0;
    }
    if ($dp[$i][$j] != -1) {
        return $dp[$i][$j];
    }
    $min = PHP_INT_MAX;
    for ($t = $i; $t < $j; $t += $k - 1) {
        $min1 = $this->check($prefix, $k, $i, $t, $dp) + $this->check($prefix, $k, $t + 1, $j, $dp);
        $min = min($min, $min1);
    }
    if (($j - $i) % ($k - 1) == 0) {
        $min += $prefix[$j + 1] - $prefix[$i];
    }
    $dp[$i][$j] = $min;
    return $min;
}
}

$solution = new Solution();
echo $solution->mergeStones([3,2,4,1], 2);
