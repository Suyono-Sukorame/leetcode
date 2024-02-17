class Solution {

/**
 * @param Integer $n
 * @return Integer
 */
function countArrangement($n) {
    $count = 0;
    $visited = array_fill(1, $n, false);
    $this->backtrack($n, 1, $visited, $count);
    return $count;
}

function backtrack($n, $pos, &$visited, &$count) {
    if ($pos > $n) {
        $count++;
        return;
    }
    
    for ($i = 1; $i <= $n; $i++) {
        if (!$visited[$i] && ($i % $pos == 0 || $pos % $i == 0)) {
            $visited[$i] = true;
            $this->backtrack($n, $pos + 1, $visited, $count);
            $visited[$i] = false;
        }
    }
}
}