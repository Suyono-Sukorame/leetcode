class Solution {

/**
 * @param Integer[][] $image
 * @return Integer[][]
 */
function flipAndInvertImage($image) {
    $n = count($image);
    for ($i = 0; $i < $n; $i++) {
        $image[$i] = array_reverse($image[$i]);
        for ($j = 0; $j < $n; $j++) {
            $image[$i][$j] = $image[$i][$j] == 1 ? 0 : 1;
        }
    }
    return $image;
}
}