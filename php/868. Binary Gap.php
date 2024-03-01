class Solution {

/**
 * @param Integer $n
 * @return Integer
 */
function binaryGap($n) {
    $maxDistance = 0;
    $lastOneIndex = -1;
    $binary = decbin($n);
    
    for ($i = 0; $i < strlen($binary); $i++) {
        if ($binary[$i] === '1') {
            if ($lastOneIndex != -1) {
                $maxDistance = max($maxDistance, $i - $lastOneIndex);
            }
            $lastOneIndex = $i;
        }
    }
    
    return $maxDistance;
}
}
