class Solution {
    /**
     * @param String $num1
     * @param String $num2
     * @return String
     */
    function complexNumberMultiply($num1, $num2) {
        list($real1, $imaginary1) = $this->parseComplexNumber($num1);
        list($real2, $imaginary2) = $this->parseComplexNumber($num2);
        
        $real = $real1 * $real2 - $imaginary1 * $imaginary2;
        $imaginary = $real1 * $imaginary2 + $real2 * $imaginary1;
        
        return "$real+$imaginary" . 'i';
    }
    
    function parseComplexNumber($num) {
        $parts = explode('+', $num);
        $real = (int) $parts[0];
        $imaginary = (int) rtrim($parts[1], 'i');
        return [$real, $imaginary];
    }
}
