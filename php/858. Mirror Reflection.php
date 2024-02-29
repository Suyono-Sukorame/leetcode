class Solution {
    /**
     * @param Integer $p
     * @param Integer $q
     * @return Integer
     */
    function mirrorReflection($p, $q) {
        while ($p % 2 == 0 && $q % 2 == 0) {
            $p /= 2;
            $q /= 2;
        }
        
        if ($q % 2 == 0 && $p % 2 != 0) {
            return 0;
        }
        
        if ($q % 2 != 0 && $p % 2 == 0) {
            return 2;
        }

        if ($q % 2 != 0 && $p % 2 != 0) {
            return 1;
        }

        return -1;
    }
}
