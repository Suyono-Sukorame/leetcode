class Solution {

/**
 * @param Integer[] $stones
 * @return Boolean
 */
function canCross($stones) {
    $n = count($stones);
    
    $visited = [];
    
    $dfs = function($pos, $jump) use (&$dfs, &$visited, $stones, $n) {
        if ($pos == $n - 1) return true;
        
        if (isset($visited[$pos]) && isset($visited[$pos][$jump])) return $visited[$pos][$jump];
        
        for ($i = $pos + 1; $i < $n; $i++) {
            $gap = $stones[$i] - $stones[$pos];
            
            if ($gap >= $jump - 1 && $gap <= $jump + 1) {
                if ($dfs($i, $gap)) {
                    $visited[$pos][$jump] = true;
                    return true;
                }
            }
            
            if ($gap > $jump + 1) break;
        }
        
        $visited[$pos][$jump] = false;
        return false;
    };
    
    return $dfs(0, 0);
}
}
