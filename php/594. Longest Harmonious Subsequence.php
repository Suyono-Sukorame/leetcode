class Solution {

/**
 * @param Integer[] $nums
 * @return Integer
 */
function findLHS($nums) {
    $count = [];
    $max_length = 0;
    
    foreach ($nums as $num) {
        if (!isset($count[$num])) {
            $count[$num] = 0;
        }
        $count[$num]++;
    }
    
    foreach ($count as $num => $freq) {
        if (isset($count[$num + 1])) {
            $max_length = max($max_length, $freq + $count[$num + 1]);
        }
    }
    
    return $max_length;
}
}
