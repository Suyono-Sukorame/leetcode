class Solution {
    /**
     * @param String $word
     * @return Integer
     */
    function minimumDistance($word) {
        $dist = function ($from, $to) {
            if ($from == -1) return 0; 
            $d1 = abs((ord($from) - 65) % 6 - (ord($to) - 65) % 6);
            $d2 = abs(floor((ord($from) - 65) / 6) - floor((ord($to) - 65) / 6));
            return $d1 + $d2;
        };

        $dp = [];

        $dfs = function ($i, $lpos, $rpos) use (&$dfs, &$word, &$dist, &$dp) {
            if ($i == strlen($word)) 
                return 0;
            $key = "$i,$lpos,$rpos";
            if (isset($dp[$key])) 
                return $dp[$key];
            $dp[$key] = min(
                $dist($lpos, $word[$i]) + $dfs($i + 1, $word[$i], $rpos), 
                $dist($rpos, $word[$i]) + $dfs($i + 1, $lpos, $word[$i])
            );
            return $dp[$key];
        };

        return $dfs(0, -1, -1);
    }
}
