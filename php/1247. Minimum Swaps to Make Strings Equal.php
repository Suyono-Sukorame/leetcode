class Solution {

/**
 * @param String $s1
 * @param String $s2
 * @return Integer
 */
function minimumSwap($s1, $s2) {
    $xy = 0; 
    $yx = 0; 
    
    for ($i = 0; $i < strlen($s1); $i++) {
        if ($s1[$i] != $s2[$i]) {
            if ($s1[$i] == 'x') {
                $xy++;
            } else {
                $yx++;
            }
        }
    }
    
    if (($xy + $yx) % 2 != 0) {
        return -1;
    }
    
    $swaps = intval($xy / 2) + intval($yx / 2);
    
    if ($xy % 2 != 0 && $yx % 2 != 0) {
        $swaps += 2;
    }
    
    return $swaps;
}
}
