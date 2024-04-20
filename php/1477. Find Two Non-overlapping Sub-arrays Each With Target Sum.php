class Solution {
    public function minSumOfLengths($arr, $target) {
        $n = count($arr);
        $i = $n - 1;
        $j = $n - 1;
        $ans = PHP_INT_MAX;
        $sum = 0;
        $dp = array_fill(0, $n + 1, -1);

        while ($i >= 0) {
            $sum += $arr[$i];
            while ($sum > $target)
                $sum -= $arr[$j--];
            
            if ($sum == $target) {
                $dp[$i] = $j - $i + 1;
                if ($dp[$i + 1] != -1 && $dp[$i + 1] < $dp[$i])
                    $dp[$i] = $dp[$i + 1];
                if ($dp[$j + 1] != -1)
                    $ans = min($ans, $j - $i + 1 + $dp[$j + 1]);
            } else {
                $dp[$i] = $dp[$i + 1];
            }
            $i--;
        }
        return $ans == PHP_INT_MAX ? -1 : $ans;
    }
}