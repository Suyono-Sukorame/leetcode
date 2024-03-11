class Solution {

function clumsy($n) {
    $ans = 1;
    if ($n <= 4) {
        if ($n <= 2) return $n;
        elseif ($n == 3) return 6;
        elseif ($n == 4) return 7;
    } else {
        if ($n % 4 == 1 || $n % 4 == 2) $ans = $n + 2;
        elseif ($n % 4 == 3) $ans = $n - 1;
        else $ans = $n + 1;
    }
    return $ans;
}
}
