class Solution {

/**
 * @param Integer[] $arr
 * @return Integer
 */
function minSetSize($arr) {
    $n = count($arr);
    $counts = array_count_values($arr);
    arsort($counts);
    
    $removed = 0;
    $half = $n / 2;
    $size = 0;
    
    foreach ($counts as $count) {
        $size++;
        $removed += $count;
        if ($removed >= $half) {
            break;
        }
    }
    
    return $size;
}
}
