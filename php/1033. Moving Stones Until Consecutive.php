class Solution {

/**
 * @param Integer $a
 * @param Integer $b
 * @param Integer $c
 * @return Integer[]
 */
function numMovesStones($a, $b, $c) {
    $stones = [$a, $b, $c];
    sort($stones);
    $minMoves = 0;
    
    if ($stones[2] - $stones[0] == 2) {
        $minMoves = 0;
    } elseif ($stones[1] - $stones[0] <= 2 || $stones[2] - $stones[1] <= 2) {
        $minMoves = 1;
    } else {
        $minMoves = 2;
    }
    
    $maxMoves = $stones[2] - $stones[0] - 2;
    
    return [$minMoves, $maxMoves];
}
}
