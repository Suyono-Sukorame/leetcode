class Solution {

function kWeakestRows($mat, $k) {
    $m = count($mat);
    $n = count($mat[0]);
    $strengths = [];
    
    for ($i = 0; $i < $m; $i++) {
        $soldiers = array_sum($mat[$i]);
        $strengths[$i] = [$i, $soldiers];
    }
    
    usort($strengths, function($a, $b) {
        if ($a[1] != $b[1]) {
            return $a[1] - $b[1];
        } else {
            return $a[0] - $b[0];
        }
    });
    
    $result = [];
    for ($i = 0; $i < $k; $i++) {
        $result[] = $strengths[$i][0];
    }
    
    return $result;
}
}
