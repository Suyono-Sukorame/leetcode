class Solution {

/**
 * @param Integer[][] $points
 * @return Integer
 */
function minAreaRect($points) {
    $map = [];
    
    foreach ($points as $point) {
        if (!isset($map[$point[0]])) {
            $map[$point[0]] = [];
        }
        $map[$point[0]][] = $point[1];
    }
    
    $min = PHP_INT_MAX;
    sort($points);
    
    foreach ($points as $i => $point1) {
        foreach (array_slice($points, $i + 1) as $point2) {
            if ($point1[0] == $point2[0] || $point1[1] == $point2[1]) {
                continue;
            }
            $area = abs($point1[0] - $point2[0]) * abs($point1[1] - $point2[1]);
            if ($area < $min && in_array($point2[1], $map[$point1[0]]) && in_array($point1[1], $map[$point2[0]])) {
                $min = $area;
            }
        }
    }
    
    return $min == PHP_INT_MAX ? 0 : $min;
}
}
