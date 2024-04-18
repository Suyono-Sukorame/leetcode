class Solution {

function maxArea($h, $w, $horizontalCuts, $verticalCuts) {
    sort($horizontalCuts);
    sort($verticalCuts);
    
    array_unshift($horizontalCuts, 0);
    array_push($horizontalCuts, $h);
    array_unshift($verticalCuts, 0);
    array_push($verticalCuts, $w);
    
    $maxHorizontalDiff = $maxVerticalDiff = 0;
    
    for ($i = 1; $i < count($horizontalCuts); $i++) {
        $maxHorizontalDiff = max($maxHorizontalDiff, $horizontalCuts[$i] - $horizontalCuts[$i - 1]);
    }
    
    for ($i = 1; $i < count($verticalCuts); $i++) {
        $maxVerticalDiff = max($maxVerticalDiff, $verticalCuts[$i] - $verticalCuts[$i - 1]);
    }
    
    return ($maxHorizontalDiff * $maxVerticalDiff) % (pow(10, 9) + 7);
}
}
