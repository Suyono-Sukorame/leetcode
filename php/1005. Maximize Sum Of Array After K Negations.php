class Solution {

function largestSumAfterKNegations($nums, $k) {
    $numbers = array_fill(0, 201, 0);
    $sum = 0;
    $maxAbs = 0;

    foreach ($nums as $n) {
        $maxAbs = max($maxAbs, abs($n));
        $numbers[100 + $n]++;
        $sum += $n;
    }

    if ($maxAbs == 0) {
        return 0;
    }

    while ($k-- != 0) {
        $i = 100 - $maxAbs;
        while ($numbers[$i] == 0) {
            $i++;
        }
        $numbers[$i]--;
        $numbers[200 - $i]++;
        $sum -= 2 * ($i - 100);
    }

    return $sum;
}
}
