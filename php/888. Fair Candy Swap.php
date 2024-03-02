class Solution {

/**
 * @param Integer[] $aliceSizes
 * @param Integer[] $bobSizes
 * @return Integer[]
 */
function fairCandySwap($aliceSizes, $bobSizes) {
    $aliceTotal = array_sum($aliceSizes);
    $bobTotal = array_sum($bobSizes);
    
    $aliceSet = array_flip($aliceSizes);
    
    $target = ($aliceTotal + $bobTotal) / 2;
    
    foreach ($bobSizes as $bob) {
        $needed = $target - ($bobTotal - $bob);
        if (isset($aliceSet[$needed])) {
            return [$needed, $bob];
        }
    }
    
    return [];
}
}