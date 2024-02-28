class Solution {
    function consecutiveNumbersSum($N) {
        $sum = 0;
        $ans = 0;
        
        for ($i = 1; $sum < $N; $i++) {
            $sum += $i;
            if (($N - $sum) % $i == 0) {
                $ans++;
            }
        }
        
        return $ans;
    }
}
