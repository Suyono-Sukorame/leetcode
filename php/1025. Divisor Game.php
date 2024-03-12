class Solution {

function divisorGame($n) {
    $dp = array_fill(0, $n + 1, false);
    
    for ($i = 2; $i <= $n; $i++) {
        for ($x = 1; $x < $i; $x++) {
            if ($i % $x == 0 && !$dp[$i - $x]) {
                $dp[$i] = true;
                break;
            }
        }
    }
    
    return $dp[$n];
}
}