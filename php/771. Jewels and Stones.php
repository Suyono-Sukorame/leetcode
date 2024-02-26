class Solution {
    /**
     * @param String $jewels
     * @param String $stones
     * @return Integer
     */
    function numJewelsInStones($jewels, $stones) {
        $jewelSet = array_flip(str_split($jewels));
        
        $count = 0;
        for ($i = 0; $i < strlen($stones); $i++) {
            if (isset($jewelSet[$stones[$i]])) {
                $count++;
            }
        }
        
        return $count;
    }
}
