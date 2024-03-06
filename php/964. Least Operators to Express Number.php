class Solution {

function leastOpsExpressTarget($x, $y) {
    $pos = 0;
    $neg = 0;
    $k = 0;
    
    while ($y > 0) {
        $cur = $y % $x;
        $y /= $x;
        
        if ($k > 0) {
            $pos2 = min($cur * $k + $pos, ($cur + 1) * $k + $neg);
            $neg2 = min(($x - $cur) * $k + $pos, ($x - $cur - 1) * $k + $neg);
            $pos = $pos2;
            $neg = $neg2;
        } else {
            $pos = $cur * 2;
            $neg = ($x - $cur) * 2;
        }
        $k++;
    }
    
    return min($pos, $k + $neg) - 1;
}
}
