class Solution {

/**
 * @param Integer[] $arr1
 * @param Integer[] $arr2
 * @param Integer $d
 * @return Integer
 */
function findTheDistanceValue($arr1, $arr2, $d) {
    $count = 0;
    for ($i = 0; $i < count($arr1); $i++) {
        $mark = 0;
        for ($j = 0; $j < count($arr2); $j++) {
            $x = abs($arr1[$i] - $arr2[$j]);
            if ($x <= $d) {
                $j = count($arr2) - 1;
            } else {
                $mark++;
            }
        }
        if ($mark == count($arr2)) {
            $count++;
        }
    }
    return $count;
}
}
