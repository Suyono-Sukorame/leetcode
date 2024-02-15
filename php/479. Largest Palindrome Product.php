class Solution {

/**
 * @param Integer $n
 * @return Integer
 */
function largestPalindrome($n) {
    if ($n == 1) return 9;
    
    $max_num = (int)str_repeat('9', $n);
    $min_num = (int)str_repeat('1', $n);
    
    for ($i = $max_num; $i >= $min_num; $i--) {
        $palindrome = intval($i . strrev($i));
        for ($j = $max_num; $j * $j >= $palindrome; $j--) {
            if ($palindrome % $j == 0 && $palindrome / $j <= $max_num) {
                return $palindrome % 1337;
            }
        }
    }
    
    return -1;
}
}

$solution = new Solution();
echo $solution->largestPalindrome(2) . "\n"; // Output: 987
echo $solution->largestPalindrome(1) . "\n"; // Output: 9
