class Solution {

/**
 * @param String $s
 * @return String[]
 */
function findRepeatedDnaSequences($s) {
    $sequences = [];
    $seen = [];
    
    for ($i = 0; $i <= strlen($s) - 10; $i++) {
        $sequence = substr($s, $i, 10);
        if (isset($seen[$sequence]) && $seen[$sequence] == 1) {
            $sequences[] = $sequence;
        }
        $seen[$sequence] = isset($seen[$sequence]) ? $seen[$sequence] + 1 : 1;
    }
    
    return $sequences;
}
}
