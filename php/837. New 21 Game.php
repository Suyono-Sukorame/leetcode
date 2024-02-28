class Solution {
    function new21Game($n, $k, $maxPts) {
        if ($k == 0) return 1.0;

        $dp = array_fill(0, $k + $maxPts, 0);
        $dp[0] = 1.0;
        $sumDP = 1.0;

        for ($i = 1; $i < $k + $maxPts; $i++) {
            $dp[$i] = $sumDP / $maxPts;
            if ($i < $k) $sumDP += $dp[$i];
            if ($i >= $maxPts) $sumDP -= $dp[$i - $maxPts];
        }

        $sum = 0.0;
        for ($i = $k; $i <= min($n, $k + $maxPts - 1); $i++) $sum += $dp[$i];

        $total = $sum;
        for ($i = $n + 1; $i < $k + $maxPts; $i++) $total += $dp[$i];

        return $sum / $total;
    }
}