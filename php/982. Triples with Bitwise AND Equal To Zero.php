class Solution {
    function countTriplets($nums) {
        $max = 0;
        foreach ($nums as $num) {
            $max = max($max, $num);
        }
        $N = 1;
        while ($N <= $max) {
            $N <<= 1;
        }
        $cnt = array_fill(0, $N, 0);
        foreach ($nums as $x) {
            foreach ($nums as $y) {
                $cnt[$x & $y]++;
            }
        }
        $ans = 0;
        foreach ($nums as $num) {
            $subset = $num ^ ($N - 1);
            $ans += $cnt[0];
            for ($i = $subset; $i > 0; $i = $subset & ($i - 1)) {
                $ans += $cnt[$i];
            }
        }
        return $ans;
    }
}
