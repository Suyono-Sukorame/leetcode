class Solution {

function gridIllumination($n, $lamps, $queries) {
    $row = array_fill(0, $n, 0);
    $col = array_fill(0, $n, 0);
    $diag1 = array_fill(0, 2 * $n - 1, 0);
    $diag2 = array_fill(0, 2 * $n - 1, 0);
    
    $lampSet = [];
    foreach ($lamps as $lamp) {
        list($r, $c) = $lamp;
        $row[$r]++;
        $col[$c]++;
        $diag1[$r + $c]++;
        $diag2[$r - $c + $n - 1]++;
        $lampSet["$r,$c"] = true;
    }
    
    $result = [];
    foreach ($queries as $query) {
        list($r, $c) = $query;
        if ($row[$r] > 0 || $col[$c] > 0 || $diag1[$r + $c] > 0 || $diag2[$r - $c + $n - 1] > 0) {
            $result[] = 1;
            for ($i = $r - 1; $i <= $r + 1; $i++) {
                for ($j = $c - 1; $j <= $c + 1; $j++) {
                    if ($i >= 0 && $i < $n && $j >= 0 && $j < $n && isset($lampSet["$i,$j"])) {
                        unset($lampSet["$i,$j"]);
                        $row[$i]--;
                        $col[$j]--;
                        $diag1[$i + $j]--;
                        $diag2[$i - $j + $n - 1]--;
                    }
                }
            }
        } else {
            $result[] = 0;
        }
    }
    
    return $result;
}
}
