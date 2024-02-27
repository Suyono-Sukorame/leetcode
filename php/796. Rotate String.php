class Solution {
    /**
     * @param String $s
     * @param String $goal
     * @return Boolean
     */
    function rotateString($s, $goal) {
        if (strlen($s) !== strlen($goal)) {
            return false;
        }
        
        if ($s === "" && $goal === "") {
            return true;
        }
        
        $s .= $s;
        
        return strpos($s, $goal) !== false;
    }
}
