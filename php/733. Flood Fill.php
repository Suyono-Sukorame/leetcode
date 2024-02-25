class Solution {

/**
 * @param Integer[][] $image
 * @param Integer $sr
 * @param Integer $sc
 * @param Integer $newColor
 * @return Integer[][]
 */
function floodFill($image, $sr, $sc, $newColor) {
    $rows = count($image);
    $cols = count($image[0]);
    
    if ($image[$sr][$sc] == $newColor) {
        return $image;
    }
    
    $oldColor = $image[$sr][$sc];
    $this->dfs($image, $sr, $sc, $oldColor, $newColor, $rows, $cols);
    
    return $image;
}

function dfs(&$image, $row, $col, $oldColor, $newColor, $rows, $cols) {
    if ($row < 0 || $row >= $rows || $col < 0 || $col >= $cols || $image[$row][$col] != $oldColor) {
        return;
    }
    
    $image[$row][$col] = $newColor;
    
    $this->dfs($image, $row + 1, $col, $oldColor, $newColor, $rows, $cols); // Down
    $this->dfs($image, $row - 1, $col, $oldColor, $newColor, $rows, $cols); // Up
    $this->dfs($image, $row, $col + 1, $oldColor, $newColor, $rows, $cols); // Right
    $this->dfs($image, $row, $col - 1, $oldColor, $newColor, $rows, $cols); // Left
}
}
