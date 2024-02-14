class Solution {

/**
 * @param Integer[] $g
 * @param Integer[] $s
 * @return Integer
 */
function findContentChildren($g, $s) {
    sort($g);
    sort($s);
    
    $i = 0;
    $j = 0;
    $count = 0;
    
    while ($i < count($g) && $j < count($s)) {
        if ($s[$j] >= $g[$i]) {
            $count++;
            $i++;
            $j++;
        } else {
            $j++;
        }
    }
    
    return $count;
}
}
