class Solution {

/**
 * @param Integer[][] $points
 * @return Float
 */
function largestTriangleArea($points) {
    $n = count($points);
    $maxArea = 0;
    
    for ($i = 0; $i < $n; $i++) {
        for ($j = $i + 1; $j < $n; $j++) {
            for ($k = $j + 1; $k < $n; $k++) {
                $area = $this->triangleArea($points[$i], $points[$j], $points[$k]);
                $maxArea = max($maxArea, $area);
            }
        }
    }
    
    return $maxArea;
}

function triangleArea($p1, $p2, $p3) {
    return 0.5 * abs($p1[0]*($p2[1] - $p3[1]) + $p2[0]*($p3[1] - $p1[1]) + $p3[0]*($p1[1] - $p2[1]));
}
}