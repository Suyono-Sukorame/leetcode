class Solution {
    /**
     * @param String $s
     * @param String $t
     * @return Boolean
     */
    function backspaceCompare($s, $t) {
        return $this->processString($s) === $this->processString($t);
    }
    
    function processString($str) {
        $stack = [];
        for ($i = 0; $i < strlen($str); $i++) {
            if ($str[$i] !== '#') {
                array_push($stack, $str[$i]);
            } else {
                if (!empty($stack)) {
                    array_pop($stack);
                }
            }
        }
        return implode("", $stack);
    }
}
