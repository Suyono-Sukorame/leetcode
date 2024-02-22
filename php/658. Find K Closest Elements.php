class Solution {

function findClosestElements($arr, $k, $x) {
    $left = 0;
    $right = count($arr) - $k;
    while ($left < $right) {
        $mid = ($left + $right) >> 1;
        if ($x - $arr[$mid] > $arr[$mid + $k] - $x) {
            $left = $mid + 1;
        } else {
            $right = $mid;
        }
    }
    return array_slice($arr, $left, $k);
}
}
