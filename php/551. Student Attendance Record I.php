class Solution {

/**
 * @param String $s
 * @return Boolean
 */
function checkRecord($s) {
    $absentCount = 0;
    $lateCount = 0;
    
    for ($i = 0; $i < strlen($s); $i++) {
        if ($s[$i] == 'A') {
            $absentCount++;
            $lateCount = 0;
            if ($absentCount >= 2) {
                return false;
            }
        } elseif ($s[$i] == 'L') {
            $lateCount++;
            if ($lateCount >= 3) {
                return false;
            }
        } else {
            $lateCount = 0;
        }
    }
    
    return true;
}
}
