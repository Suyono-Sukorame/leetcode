class Solution {
    function minFlipsMonoIncr($s) {
        $ans = 0;
        $noOfFlip = 0;
        
        for ($i = 0; $i < strlen($s); $i++) {
            if ($s[$i] == '0') {
                $ans = min($noOfFlip, $ans + 1);
            } else {
                $noOfFlip++;
            }
        }
        return $ans;
    }
}