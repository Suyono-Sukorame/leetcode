class Solution {

/**
 * @param String $seq
 * @return Integer[]
 */
function maxDepthAfterSplit($seq) {
    $result = [];
    $depth = 0;
    
    for ($i = 0; $i < strlen($seq); $i++) {
        if ($seq[$i] === '(') {
            $depth++;
            $result[] = $depth % 2;
        } else {
            $result[] = $depth % 2;
            $depth--;
        }
    }
    
    return $result;
}
}
