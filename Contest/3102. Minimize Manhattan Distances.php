class Solution {
    /**
     * @param Integer[][] $points
     * @return Integer
     */
    function minimumDistance($points) {
        $get = function($x) {
            $mxs = PHP_INT_MIN;
            $mns = PHP_INT_MAX;
            $mxd = PHP_INT_MIN;
            $mnd = PHP_INT_MAX;

            foreach ($x as list($u, $v)) {
                $mxs = max($mxs, $u + $v);
                $mns = min($mns, $u + $v);
                $mxd = max($mxd, $u - $v);
                $mnd = min($mnd, $u - $v);
            }

            return max($mxs - $mns, $mxd - $mnd);
        };

        $poss = [];
        
        usort($points, function($a, $b) {
            return $a[0] + $a[1] <=> $b[0] + $b[1];
        });e
        $poss[] = $get(array_slice($points, 1));
        $poss[] = $get(array_slice($points, 0, -1));

        usort($points, function($a, $b) {
            return $a[0] - $a[1] <=> $b[0] - $b[1];
        });
        $poss[] = $get(array_slice($points, 1));
        $poss[] = $get(array_slice($points, 0, -1));
        
        return min($poss);
    }
}
