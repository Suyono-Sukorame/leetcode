class Solution {
    const CLOCKWISE = 1;
    const COUNTERCLOCKWISE = 2;
    const COLLINEAR = 0;

    /**
     * @param Integer[][] $trees
     * @return Integer[][]
     */
    function outerTrees($trees) {
        if (count($trees) <= 3) {
            return $trees;
        }
        
        $result = [];
        $l = 0;
        
        for ($i = 0; $i < count($trees); $i++) {
            if ($trees[$i][0] < $trees[$l][0]) {
                $l = $i;
            } elseif ($trees[$i][0] == $trees[$l][0] && $trees[$i][1] < $trees[$l][1]) {
                $l = $i;
            }
        }

        $p = $l;

        do {
            $q = ($p + 1) % count($trees);
            for ($i = 0; $i < count($trees); $i++) {
                if ($this->orientation($trees[$p], $trees[$i], $trees[$q]) == self::COUNTERCLOCKWISE) {
                    $q = $i;
                }
            }
            
            for ($i = 0; $i < count($trees); $i++) {
                if ($i != $p && $i != $q 
                    && $this->orientation($trees[$p], $trees[$i], $trees[$q]) == self::COLLINEAR
                    && $this->inbetween($trees[$p], $trees[$i], $trees[$q])) {
                    $result[] = $trees[$i];
                }
            }
            
            $result[] = $trees[$q];
            $p = $q;
        } while ($p != $l);
        
        return array_values(array_unique($result, SORT_REGULAR));
    }
    
    function orientation($p, $q, $r) {
        $val = ($q[1] - $p[1]) * ($r[0] - $q[0]) - ($q[0] - $p[0]) * ($r[1] - $q[1]);
        
        if ($val == 0) {
            return self::COLLINEAR;
        } elseif ($val > 0) {
            return self::CLOCKWISE;
        } else {
            return self::COUNTERCLOCKWISE;
        }
    }
    
    function inbetween($p, $i, $q) {
        $a = ($i[0] >= $p[0] && $i[0] <= $q[0]) || ($i[0] <= $p[0] && $i[0] >= $q[0]);
        $b = ($i[1] >= $p[1] && $i[1] <= $q[1]) || ($i[1] <= $p[1] && $i[1] >= $q[1]);
        return $a && $b;
    }
}
