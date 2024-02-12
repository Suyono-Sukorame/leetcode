class Solution {

/**
 * @param String $s
 * @return Integer
 */
function longestPalindrome($s) {
    $charCount = array_count_values(str_split($s));
    $length = 0;
    $oddFound = false;
    
    foreach ($charCount as $count) {
        if ($count % 2 == 0) {
            $length += $count;
        } else {
            $length += $count - 1;
            $oddFound = true;
        }
    }
    
    return $length + ($oddFound ? 1 : 0);
}
}

$solution = new Solution();
echo $solution->longestPalindrome("abccccdd"); // Output: 7
echo $solution->longestPalindrome("a"); // Output: 1
