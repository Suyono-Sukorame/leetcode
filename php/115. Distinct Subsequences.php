class Solution {

/**
 * @param String $s
 * @param String $t
 * @return Integer
 */
function numDistinct($s, $t) {
    $m = strlen($s);
    $n = strlen($t);
    
    // Create a 2D array to store the number of distinct subsequences
    $dp = array_fill(0, $m + 1, array_fill(0, $n + 1, 0));
    
    // Initialize the first column to 1
    for ($i = 0; $i <= $m; $i++) {
        $dp[$i][0] = 1;
    }
    
    // Calculate the number of distinct subsequences
    for ($i = 1; $i <= $m; $i++) {
        for ($j = 1; $j <= $n; $j++) {
            if ($s[$i - 1] == $t[$j - 1]) {
                // If the characters match, we can either include or exclude the character
                $dp[$i][$j] = $dp[$i - 1][$j - 1] + $dp[$i - 1][$j];
            } else {
                // If the characters don't match, we can only exclude the character
                $dp[$i][$j] = $dp[$i - 1][$j];
            }
        }
    }
    
    return $dp[$m][$n];
}
}
