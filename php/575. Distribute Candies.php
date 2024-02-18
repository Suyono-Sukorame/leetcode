class Solution {

/**
 * @param Integer[] $candyType
 * @return Integer
 */
function distributeCandies($candyType) {
    $uniqueCandies = array_unique($candyType);
    $maxAllowed = count($candyType) / 2;
    
    return min(count($uniqueCandies), $maxAllowed);
}
}
