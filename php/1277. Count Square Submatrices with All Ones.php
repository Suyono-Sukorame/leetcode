class Solution {

function countSquares($matrix) {
    $m = count($matrix);
    $n = count($matrix[0]);
    $count = 0;
    
    $dp = array_fill(0, $m, array_fill(0, $n, 0));
    
    for ($i = 0; $i < $m; $i++) {
        $dp[$i][0] = $matrix[$i][0];
        $count += $dp[$i][0];
    }
    for ($j = 1; $j < $n; $j++) {
        $dp[0][$j] = $matrix[0][$j];
        $count += $dp[0][$j];
    }
    
    for ($i = 1; $i < $m; $i++) {
        for ($j = 1; $j < $n; $j++) {
            if ($matrix[$i][$j] == 1) {
                $dp[$i][$j] = min($dp[$i-1][$j], $dp[$i][$j-1], $dp[$i-1][$j-1]) + 1;
                $count += $dp[$i][$j];
            }
        }
    }
    
    return $count;
}
}
