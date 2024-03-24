class Solution {
    /**
     * @param Integer $num
     * @return Integer
     */
    function maximum69Number($num) {
        $numStr = (string)$num;
        $pos = strpos($numStr, '6');
        
        if ($pos === false) {
            return $num;
        }
        
        $numStr[$pos] = '9';
        
        return (int)$numStr;
    }
}
