class Solution {

/**
 * @param Integer[][] $rectangles
 * @return Boolean
 */
function isRectangleCover($rectangles) {
    $minX = PHP_INT_MAX;
    $minY = PHP_INT_MAX;
    $maxX = PHP_INT_MIN;
    $maxY = PHP_INT_MIN;
    $area = 0;
    $vertices = array();
    
    foreach ($rectangles as $rect) {
        list($x1, $y1, $x2, $y2) = $rect;
        $minX = min($minX, $x1);
        $minY = min($minY, $y1);
        $maxX = max($maxX, $x2);
        $maxY = max($maxY, $y2);
        $area += ($x2 - $x1) * ($y2 - $y1);
        
        $vertices["$x1-$y1"]++;
        $vertices["$x1-$y2"]++;
        $vertices["$x2-$y1"]++;
        $vertices["$x2-$y2"]++;
    }
    
    $enclosingArea = ($maxX - $minX) * ($maxY - $minY);
    if ($area != $enclosingArea) {
        return false;
    }
    
    $expectedVertices = array("$minX-$minY", "$minX-$maxY", "$maxX-$minY", "$maxX-$maxY");
    foreach ($expectedVertices as $vertex) {
        if (!isset($vertices[$vertex]) || $vertices[$vertex] != 1) {
            return false;
        }
        unset($vertices[$vertex]);
    }
    
    foreach ($vertices as $count) {
        if ($count % 2 != 0) {
            return false;
        }
    }
    
    return true;
}
}
