class Solution {

/**
 * @param Integer $num
 * @return Integer
 */
function findComplement($num) {
    $mask = 1;
    while ($mask < $num) {
        $mask = ($mask << 1) | 1;
    }
    return $num ^ $mask;
}
}
