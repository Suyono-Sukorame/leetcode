class Solution {

/**
 * @param Integer[] $arr
 * @return Boolean
 */
function validMountainArray($arr) {
    $n = count($arr);
    
    if ($n < 3) {
        return false;
    }
    
    $i = 0;
    
    while ($i + 1 < $n && $arr[$i] < $arr[$i + 1]) {
        $i++;
    }
    
    if ($i == 0 || $i == $n - 1) {
        return false;
    }
    
    while ($i + 1 < $n && $arr[$i] > $arr[$i + 1]) {
        $i++;
    }
    
    return $i == $n - 1;
}
}
