class Solution {

/**
 * @param Integer[][] $mat
 * @return Integer[][]
 */
function diagonalSort($mat) {
    $m = count($mat);
    $n = count($mat[0]);
    
    for ($i = 0; $i < $m; $i++) {
        $this->sortDiagonal($mat, $i, 0);
    }
    
    for ($j = 1; $j < $n; $j++) {
        $this->sortDiagonal($mat, 0, $j);
    }
    
    return $mat;
}

function sortDiagonal(&$mat, $i, $j) {
    $diagonal = [];
    $m = count($mat);
    $n = count($mat[0]);
    
    while ($i < $m && $j < $n) {
        $diagonal[] = $mat[$i][$j];
        $i++;
        $j++;
    }
    
    sort($diagonal);
    
    $i = $i - count($diagonal);
    $j = $j - count($diagonal);
    foreach ($diagonal as $val) {
        $mat[$i][$j] = $val;
        $i++;
        $j++;
    }
}
}
