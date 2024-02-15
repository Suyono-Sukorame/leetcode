class Solution {

/**
 * @param Integer $area
 * @return Integer[]
 */
function constructRectangle($area) {
    $sqrt = sqrt($area);
    for ($width = (int)$sqrt; $width >= 1; $width--) {
        if ($area % $width === 0) {
            return [$area / $width, $width];
        }
    }
    return [];
}
}
