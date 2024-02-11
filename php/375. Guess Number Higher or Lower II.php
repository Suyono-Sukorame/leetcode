class Solution {

/**
 * @param Integer $n
 * @return Integer
 */
function getMoneyAmount($n) {
    $dp = array_fill(0, $n + 1, array_fill(0, $n + 1, 0));
    return $this->calculateCost($dp, 1, $n);
}

function calculateCost(&$dp, $start, $end) {
    if ($start >= $end) return 0;
    if ($dp[$start][$end] != 0) return $dp[$start][$end];
    
    $minCost = PHP_INT_MAX;
    for ($i = $start; $i <= $end; $i++) {
        $cost = $i + max($this->calculateCost($dp, $start, $i - 1), $this->calculateCost($dp, $i + 1, $end));
        $minCost = min($minCost, $cost);
    }
    $dp[$start][$end] = $minCost;
    return $minCost;
}
}
