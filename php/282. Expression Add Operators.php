class Solution {

/**
 * @param String $num
 * @param Integer $target
 * @return String[]
 */
function addOperators($num, $target) {
    $result = [];
    $this->dfs($num, $target, 0, "", 0, 0, $result);
    return $result;
}

function dfs($num, $target, $start, $path, $eval, $multed, &$result) {
    if ($start == strlen($num)) {
        if ($eval == $target) {
            $result[] = $path;
        }
        return;
    }
    
    for ($i = $start; $i < strlen($num); $i++) {
        if ($i != $start && $num[$start] == '0') break;
        
        $curr = substr($num, $start, $i - $start + 1);
        $currVal = intval($curr);
        
        if ($start == 0) {
            $this->dfs($num, $target, $i + 1, $path . $curr, $currVal, $currVal, $result);
        } else {
            $this->dfs($num, $target, $i + 1, $path . '+' . $curr, $eval + $currVal, $currVal, $result);
            $this->dfs($num, $target, $i + 1, $path . '-' . $curr, $eval - $currVal, -$currVal, $result);
            $this->dfs($num, $target, $i + 1, $path . '*' . $curr, $eval - $multed + $multed * $currVal, $multed * $currVal, $result);
        }
    }
}
}
