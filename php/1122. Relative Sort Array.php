class Solution {

/**
 * @param Integer[] $arr1
 * @param Integer[] $arr2
 * @return Integer[]
 */
function relativeSortArray($arr1, $arr2) {
    $count = array_count_values($arr1);
    
    $result = [];
    
    foreach ($arr2 as $num) {
        if (isset($count[$num])) {
            $result = array_merge($result, array_fill(0, $count[$num], $num));
            unset($count[$num]);
        }
    }
    
    ksort($count);
    foreach ($count as $num => $occurrences) {
        $result = array_merge($result, array_fill(0, $occurrences, $num));
    }
    
    return $result;
}
}
