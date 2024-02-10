class Solution {

/**
 * @param Integer[] $nums
 * @param Integer $n
 * @return Integer
 */
function minPatches($nums, $n) {
    $patch = 0;
    $miss = 1;
    $i = 0;
    $len = count($nums);
    
    while ($miss <= $n) {
        if ($i < $len && $nums[$i] <= $miss) {
            $miss += $nums[$i];
            $i++;
        } else {
            $miss += $miss;
            $patch++;
        }
    }
    
    return $patch;
}
}
