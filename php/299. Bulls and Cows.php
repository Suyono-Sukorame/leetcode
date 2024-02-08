class Solution {

/**
 * @param String $secret
 * @param String $guess
 * @return String
 */
function getHint($secret, $guess) {
    $bulls = 0;
    $cows = 0;
    $count = array_fill(0, 10, 0);
    
    for ($i = 0; $i < strlen($secret); $i++) {
        if ($secret[$i] == $guess[$i]) {
            $bulls++;
        } else {
            $count[$secret[$i]]++;
        }
    }
    
    for ($i = 0; $i < strlen($guess); $i++) {
        if ($secret[$i] != $guess[$i] && $count[$guess[$i]] > 0) {
            $cows++;
            $count[$guess[$i]]--;
        }
    }
    
    return $bulls . "A" . $cows . "B";
}
}
