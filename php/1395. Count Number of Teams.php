class Solution {

function numTeams($rating) {
    $n = count($rating);
    $total = 0;
    for ($i = 1; $i < $n - 1; $i++) {
        $leftless = 0;
        $rightgreater = 0;
        $leftgreater = 0;
        $rightless = 0;
        for ($j = $i - 1; $j >= 0; $j--) {
            if ($rating[$i] > $rating[$j]) {
                $leftless++;
            } else {
                $leftgreater++;
            }
        }
        for ($j = $i + 1; $j < $n; $j++) {
            if ($rating[$i] > $rating[$j]) {
                $rightless++;
            } else {
                $rightgreater++;
            }
        }
        $total += $leftless * $rightgreater + $rightless * $leftgreater;
    }
    return $total;
}
}


