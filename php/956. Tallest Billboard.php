class Solution {

function tallestBillboard($rods) {
    $sum = array_sum($rods);
    $dp = array_fill(0, count($rods) + 1, array_fill(0, $sum + 1, 0));

    for ($i = 1; $i <= count($rods); $i++) {
        for ($j = 0; $j <= $sum; $j++) {
            if ($dp[$i - 1][$j] < $j) {
                continue;
            }
            $dp[$i][$j] = max($dp[$i][$j], $dp[$i - 1][$j]);
            $k = $j + $rods[$i - 1];
            $dp[$i][$k] = max($dp[$i][$k], $dp[$i - 1][$j] + $rods[$i - 1]);
            $k = abs($j - $rods[$i - 1]);
            $dp[$i][$k] = max($dp[$i][$k], $dp[$i - 1][$j] + $rods[$i - 1]);
        }
    }
    
    return $dp[count($rods)][0] / 2;
}
}
