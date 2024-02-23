class Solution {

/**
 * @param Integer $num
 * @return Integer
 */
function maximumSwap($num) {
    $numArray = str_split((string)$num);
    
    $lastPosition = array_fill(0, 10, -1);
    
    for ($i = 0; $i < count($numArray); $i++) {
        $lastPosition[$numArray[$i]] = $i;
    }
    
    for ($i = 0; $i < count($numArray); $i++) {
        for ($d = 9; $d > $numArray[$i]; $d--) {
            if ($lastPosition[$d] > $i) {
                $temp = $numArray[$i];
                $numArray[$i] = $numArray[$lastPosition[$d]];
                $numArray[$lastPosition[$d]] = $temp;
                return intval(implode('', $numArray));
            }
        }
    }
    
    return $num;
}
}
