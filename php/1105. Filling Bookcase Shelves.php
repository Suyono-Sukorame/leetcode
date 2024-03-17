class Solution {

/**
 * @param Integer[][] $books
 * @param Integer $shelfWidth
 * @return Integer
 */
function minHeightShelves($books, $shelfWidth) {
    $n = count($books);
    $dp = array_fill(0, $n + 1, 0);
    
    for ($i = 1; $i <= $n; $i++) {
        $width = $books[$i - 1][0];
        $height = $books[$i - 1][1];
        $dp[$i] = $dp[$i - 1] + $height;
        
        for ($j = $i - 1; $j > 0 && $width + $books[$j - 1][0] <= $shelfWidth; $j--) {
            $height = max($height, $books[$j - 1][1]);
            $width += $books[$j - 1][0];
            $dp[$i] = min($dp[$i], $dp[$j - 1] + $height);
        }
    }
    
    return $dp[$n];
}
}
