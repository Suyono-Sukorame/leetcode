class Solution {

/**
 * @param String $s
 * @return Integer
 */
function countSegments($s) {
    $segments = 0;
    $inSegment = false;
    
    for ($i = 0; $i < strlen($s); $i++) {
        if ($s[$i] != ' ') {
            if (!$inSegment) {
                $segments++;
                $inSegment = true;
            }
        } else {
            if ($inSegment) {
                $inSegment = false;
            }
        }
    }
    
    return $segments;
}
}
