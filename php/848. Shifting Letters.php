class Solution {
    /**
     * @param String $s
     * @param Integer[] $shifts
     * @return String
     */
    function shiftingLetters($s, $shifts) {
        $n = strlen($s);
        $totalShifts = 0;
        
        for ($i = $n - 1; $i >= 0; $i--) {
            $totalShifts = ($totalShifts + $shifts[$i]) % 26;
            $shiftedChar = ord($s[$i]) - ord('a');
            $s[$i] = chr(ord('a') + ($shiftedChar + $totalShifts) % 26);
        }
        
        return $s;
    }
}
