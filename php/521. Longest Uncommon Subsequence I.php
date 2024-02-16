class Solution {
    /**
     * @param String $a
     * @param String $b
     * @return Integer
     */
    function findLUSlength($a, $b) {
        if ($a == $b) {
            return -1;
        }
        return max(strlen($a), strlen($b));
    }
}
