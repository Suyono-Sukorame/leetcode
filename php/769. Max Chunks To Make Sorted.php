class Solution {

/**
 * @param Integer[] $arr
 * @return Integer
 */
function maxChunksToSorted($arr) {
    $maxChunks = 0;
    $maxElement = 0;
    
    for ($i = 0; $i < count($arr); $i++) {
        $maxElement = max($maxElement, $arr[$i]);
        
        if ($maxElement == $i) {
            $maxChunks++;
        }
    }
    
    return $maxChunks;
}
}
