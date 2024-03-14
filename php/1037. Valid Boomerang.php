class Solution {

/**
 * @param Integer[][] $points
 * @return Boolean
 */
function isBoomerang($points) {
    $a = $points[0][0] - $points[1][0];
    $b = $points[0][1] - $points[1][1];
    $c = $points[0][0] - $points[2][0];
    $d = $points[0][1] - $points[2][1];
    
    // Check if the cross product of the vectors is non-zero
    // If cross product is zero, points are collinear, return false
    if ($a * $d - $b * $c == 0) {
        return false;
    }
    
    return true;
}
}
