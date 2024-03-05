class Solution {

private $adjacentMoves = [
    [4, 6],
    [6, 8],
    [7, 9],
    [4, 8],
    [3, 9, 0],
    [],
    [1, 7, 0],
    [2, 6],
    [1, 3],
    [2, 4]
];

/**
 * @param Integer $n
 * @return Integer
 */
function knightDialer($n) {
    $mod = pow(10, 9) + 7;
    $dp = array_fill(0, 10, 1);
    
    for ($i = 1; $i < $n; $i++) {
        $next = array_fill(0, 10, 0);
        for ($j = 0; $j <= 9; $j++) {
            foreach ($this->adjacentMoves[$j] as $move) {
                $next[$move] += $dp[$j];
                $next[$move] %= $mod;
            }
        }
        $dp = $next;
    }
    
    return array_sum($dp) % $mod;
}
}
