class Solution {

/**
 * @param Integer[] $widths
 * @param String $s
 * @return Integer[]
 */
function numberOfLines($widths, $s) {
    $lines = 1;
    $currentWidth = 0;
    
    for ($i = 0; $i < strlen($s); $i++) {
        $charWidth = $widths[ord($s[$i]) - ord('a')];
        
        if ($currentWidth + $charWidth > 100) {
            $lines++;
            $currentWidth = $charWidth;
        } else {
            $currentWidth += $charWidth;
        }
    }
    
    return [$lines, $currentWidth];
}
}

$solution = new Solution();
$widths = [10, 20, 30, 40, 50, 60, 70, 80, 90, 100, 110, 120, 130, 140, 150, 160, 170, 180, 190, 200, 210, 220, 230, 240, 250, 260];
$s = "abcdefghijklmnopqrstuvwxyz";
$result = $solution->numberOfLines($widths, $s);
print_r($result);
