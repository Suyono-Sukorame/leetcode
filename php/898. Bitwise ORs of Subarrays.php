class Solution {

/**
 * @param Integer[] $arr
 * @return Integer
 */
function subarrayBitwiseORs($arr) {
    $or_results = [];
    $i = 0;
    $j = 0;
    
    foreach ($arr as $a) {
        $start = count($or_results);
        $or_results[] = $a;
        for ($k = $i; $k < $j; $k++) {
            $a2 = $or_results[$k] | $a;
            if ($a2 > $or_results[count($or_results) - 1]) {
                $or_results[] = $a2;
            }
        }
        $i = $start;
        $j = count($or_results);
    }
    
    return count(array_unique($or_results));
}
}
