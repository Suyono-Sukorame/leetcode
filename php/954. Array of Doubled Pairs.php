class Solution {

function canReorderDoubled($arr) {
    $plus = array_fill(0, 100011, 0);
    $minus = array_fill(0, 100011, 0);
    
    foreach ($arr as $num) {
        if ($num >= 0) {
            $plus[$num]++;
        } else {
            $minus[-$num]++;
        }
    }
    
    if ($plus[0] % 2 != 0) return false;
    
    $res = count($arr) - $plus[0];
    
    for ($i = 1; $i < count($plus) / 2; $i++) {
        if ($plus[$i] > 0) {
            $plus[2 * $i] -= $plus[$i];
            $res -= $plus[$i] * 2;
            if ($plus[2 * $i] < 0) return false;
            $plus[$i] = 0;
        }
    }
    
    for ($i = 1; $i < count($minus) / 2; $i++) {
        if ($minus[$i] > 0) {
            $minus[2 * $i] -= $minus[$i];
            $res -= $minus[$i] * 2;
            if ($minus[2 * $i] < 0) return false;
            $minus[$i] = 0;
        }
    }
    
    if ($res != 0) return false;
    return true;
}
}
