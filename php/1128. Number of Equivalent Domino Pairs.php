class Solution {

/**
 * @param Integer[][] $dominoes
 * @return Integer
 */
function numEquivDominoPairs($dominoes) {
    $counts = array_fill(0, 100, 0);
    
    $result = 0;
    foreach ($dominoes as $domino) {
        sort($domino);
        $result += $counts[$domino[0] * 10 + $domino[1]]++;
    }
    
    return $result;
}
}
