class Solution {

function bitwiseComplement($n) {
    if ($n === 0) return 1;
    
    $bits = floor(log($n, 2)) + 1;
    $mask = (1 << $bits) - 1;
    
    return $n ^ $mask;
}
}
