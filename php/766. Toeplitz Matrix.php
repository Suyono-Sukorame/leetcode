class Solution {

/**
 * @param Integer[][] $matrix
 * @return Boolean
 */
function isToeplitzMatrix($matrix) {
    $m = count($matrix);
    $n = count($matrix[0]);
    
    for ($i = 0; $i < $n; $i++) {
        if (!$this->checkDiagonal($matrix, $m, $n, 0, $i)) {
            return false;
        }
    }
    
    for ($i = 1; $i < $m; $i++) {
        if (!$this->checkDiagonal($matrix, $m, $n, $i, 0)) {
            return false;
        }
    }
    
    return true;
}

function checkDiagonal($matrix, $m, $n, $r, $c) {
    $value = $matrix[$r][$c];
    
    while ($r < $m && $c < $n) {
        if ($matrix[$r][$c] !== $value) {
            return false;
        }
        $r++;
        $c++;
    }
    
    return true;
}
}
