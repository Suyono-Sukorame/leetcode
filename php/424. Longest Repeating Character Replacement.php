class Solution {

/**
 * @param String $s
 * @param Integer $k
 * @return Integer
 */
function characterReplacement($s, $k) {
    $n = strlen($s);
    $count = array_fill(0, 26, 0);
    $maxCount = 0;
    $start = 0;
    $maxLength = 0;
    
    for ($end = 0; $end < $n; $end++) {
        $index = ord($s[$end]) - ord('A');
        $count[$index]++;
        $maxCount = max($maxCount, $count[$index]);
        
        if ($end - $start + 1 - $maxCount > $k) {
            $count[ord($s[$start]) - ord('A')]--;
            $start++;
        }
        
        $maxLength = max($maxLength, $end - $start + 1);
    }
    
    return $maxLength;
}
}

$solution = new Solution();
echo $solution->characterReplacement("ABAB", 2) . "\n"; // Output: 4
echo $solution->characterReplacement("AABABBA", 1) . "\n"; // Output: 4
