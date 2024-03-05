class Solution {

/**
 * @param String[] $strs
 * @return Integer
 */
function minDeletionSize($strs) {
    $n = count($strs);
    $m = strlen($strs[0]);
    $count = 0;
    
    for ($j = 0; $j < $m; $j++) {
        for ($i = 0; $i < $n - 1; $i++) {
            if ($strs[$i][$j] > $strs[$i + 1][$j]) {
                $count++;
                break;
            }
        }
    }
    
    return $count;
}
}
